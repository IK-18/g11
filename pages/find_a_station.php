<?php
session_start();
include '../server/scripts/db.php';
$stmt = $conn->prepare("SELECT id, name, age, gender FROM missing_persons WHERE user_id = ?");
$stmt->bind_param("s", $user_id);
$stmt->execute();
$reports = $stmt->get_result();
$stmt->close();
$stmt = $conn->prepare("SELECT id, amount, tran_reference, tran_date FROM donations WHERE user_id = ?");
$stmt->bind_param("s", $user_id);
$stmt->execute();
$donations = $stmt->get_result();
$stmt->close();
?>
<div class="section">
	<img src="http://localhost/images/policenearby-jpg.png" class="bg policenearby-jpg"></img>
</div>
<div class="container-wrapper">
	<div class="container">
		<div class="div-cont">
			<div class="heading">
				<p class="text-wrapper-1">Find Police Station Closest to Me</p>
			</div>
			<div class="div-wrapper">
				<p class="p">Enter your location below to get the closest police station to you.</p>
			</div>
		</div>
		<form id="search-station" class="form">
			<input id="search-input" class="input container-3" placeholder="Enter Street Address" type="text" />
			<div class="button-margin">
				<button role="submit" class="button">
					<div class="symbol-wrapper">
						Search
						<img class="symbol" src="http://localhost/vectors/search.svg" alt="">
					</div>
				</button>
			</div>
		</form>
		<div class="container-38">
			<div class="head-cont">
				<div>
					<label for="rows">Rows per page:</label>
					<select name="rows" id="rows">
						<option value="10">10</option>
						<option value="20">20</option>
						<option value="30">30</option>
						<option value="40">40</option>
						<option value="50">50</option>
					</select>
				</div>
				<div class="container-5">
					<div class="text-wrapper-3">Total Listing: 540</div>
				</div>
			</div>
			<table id="data-table">
				<colgroup>
					<col style="width: 3%;">
					<col style="width: 17%; padding: 1%;">
					<col style="width: 80%; padding: 1%;">
				</colgroup>
				<thead>
					<tr>
						<th class="id-col">#</th>
						<th>Name</th>
						<th>Address</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<div id="pagination" class="pagination"></div>
		</div>
	</div>
</div>
<script>
	let search = document.getElementById('search-station');
	let rows = document.getElementById('rows');
	let rowsPerPage = rows.value;
	rows.addEventListener('change', () => {
		fetchTableData(document.getElementById('rows').value, document.querySelector('.currentPage').textContent, document.getElementById('search-input').value);
	});
	search.addEventListener('submit', (e) => {
		e.preventDefault();
		fetchTableData(document.getElementById('rows').value, document.querySelector('.currentPage').textContent, document.getElementById('search-input').value);
	});

	let renderTable = (data) => {
		let tbody = document.querySelector('#data-table tbody');
		tbody.innerHTML = '';
		data.forEach(row => {
			let tr = document.createElement('tr');
			tr.innerHTML = `
			<td>${row.id}</td>
			<td>${row.name}</td>
			<td>${row.address}</td>
			`;
			tbody.appendChild(tr);
		});
	};

	let renderPagination = (totalPages, currentPage, search) => {
		let pagination = document.getElementById('pagination');
		pagination.innerHTML = '';
		let startPage = Math.max(currentPage - 5, 1);
		let endpage = Math.min(startPage + 10 - 1, totalPages);
		if (endpage - startPage + 1 < 10) {
			startPage = Math.max(endpage - 10 + 1, 1);
		}
		for (let i = startPage; i <= endpage; i++) {
			let button = document.createElement('button');
			button.textContent = i;
			button.disabled = i === currentPage;
			i === currentPage ? button.classList.add('currentPage') : null;
			button.onclick = () => {
				fetchTableData(document.getElementById('rows').value, button.textContent, document.getElementById('search-input').value);
			};
			pagination.appendChild(button);
		}
	};

	let fetchTableData = async (rowsPerPage, currentPage, search = '') => {
		if (search === '') {
			let res = await fetch(`http://localhost/server/scripts/find_a_station.php?rows=${rowsPerPage}&page=${currentPage}`);
			let result = await res.json();
			renderTable(result.rows);
			if (result.totalPages < currentPage) {
				renderPagination(result.total_pages, 1);
			} else {
				renderPagination(result.total_pages, result.current_page);
			}
		} else {
			let res = await fetch(`http://localhost/server/scripts/find_a_station.php?rows=${rowsPerPage}&page=${currentPage}&search=${search}`);
			let result = await res.json();
			renderTable(result.rows);
			if (result.totalPages < currentPage) {
				renderPagination(result.total_pages, 1, search);
			} else {
				renderPagination(result.total_pages, result.current_page, search);
			}
		}
	};

	fetchTableData(rowsPerPage, 1);
</script>