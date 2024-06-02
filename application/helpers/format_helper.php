<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function format_rupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
