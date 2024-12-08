<?php
function encryptText($tip, $key)
{
	$cipher = 'aes-256-cbc';
	$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
	$encryptedText = openssl_encrypt($tip, $cipher, $key, 0, $iv);
	return base64_encode($iv . $encryptedText);
}

function decryptText($tip, $key)
{
	$cipher = 'aes-256-cbc';
	$decoded = base64_decode($tip);
	$ivLength = openssl_cipher_iv_length($cipher);
	$iv = substr($decoded, 0, $ivLength);
	$encryptedText = substr($decoded, $ivLength);
	return openssl_decrypt($encryptedText, $cipher, $key, 0, $iv);
}