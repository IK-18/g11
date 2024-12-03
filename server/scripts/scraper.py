from bs4 import BeautifulSoup as bs
import requests
import json

data = []
headers = []
page_num = 1
while page_num < 55:
	if page_num < 2:
		url = "https://missingpersonsplatform.com/nearby-police-stations"
	else:
		url = "https://missingpersonsplatform.com/nearby-police-stations?page={}".format(page_num)
	response = requests.get(url)
	soup = bs(response.text, 'html.parser')
	if not headers:
		header_row = soup.find('table').find('tr')
		headers = [header.text.strip() for header in header_row.find_all('th')]
	table = soup.find('tbody')
	for row in table.find_all('tr'):
		columns = row.find_all('td')
		if columns:
			col_data = {f'{headers[i]}': col.text.strip() for i, col in enumerate(columns)}
			data.append(col_data)
	next_page = soup.find('a', class_='page-link')
	if not next_page:
		break
	page_num += 1

with open('police.json', 'x') as f:
	json.dump(data, f)