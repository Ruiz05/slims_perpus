<?php
/**
 *
 * Member Area/Information
 * Copyright (C) 2009  Arie Nugraha (dicarve@yahoo.com)
 * Patched by Hendro Wicaksono (hendrowicaksono@yahoo.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */


$info = __('Registration');
$page_title = __('Registration');
// Modified by Ilham Arnomo
if (isset($_POST['daftarButton'])) {
	
	$member_id = $dbs->escape_string(trim($_POST['member_id']));
	$member_name = $dbs->escape_string(trim($_POST['member_name']));
	$birth_date = $dbs->escape_string(trim($_POST['birth_date']));
	//$register_date = $_POST['register_date'];
	$register_date = $dbs->escape_string(trim(date("Y-m-d")));
	$expire_date = $dbs->escape_string(trim(date("Y-m-d")));
	$member_since_date = $dbs->escape_string(trim(date("Y-m-d")));
	$last_update = $dbs->escape_string(trim(date("Y-m-d")));
	$inst_name = $dbs->escape_string(trim($_POST["inst_name"]));
	$member_type_id = $dbs->escape_string(trim($_POST['member_type_id']));
	$gender = $dbs->escape_string(trim($_POST['gender']));
	$member_address = $dbs->escape_string(trim($_POST['member_address']));
	$postal_code = $dbs->escape_string(trim($_POST['postal_code']));
	$member_phone = $dbs->escape_string(trim($_POST['member_phone']));
	$pin = $dbs->escape_string(trim($_POST['pin']));
	$member_email = $dbs->escape_string(trim($_POST['member_email']));
	$mpasswd = $dbs->escape_string(trim(md5($_POST['mpasswd'])));


	$tambah = sprintf("INSERT INTO member(member_id, member_name, inst_name, birth_date,
		register_date,expire_date,member_since_date,member_type_id,gender,member_address,
		postal_code,is_pending,member_phone,pin, member_email, last_update, mpasswd) 
		VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', %d, %d, '%s', '%s', %d, '%s', '%s', 
			'%s', '%s', '%s')",
			$member_id, $member_name, $inst_name, $birth_date,
			$register_date, $expire_date,$member_since_date, $member_type_id, $gender, $member_address,
			$postal_code, 1, $member_phone, $pin, $member_email, $last_update, $mpasswd);

	//die($tambah);

	$hasil = $dbs->query($tambah);
	if ($dbs->affected_rows > 0 ) {
		echo '<div class="infoBox">Terima kasih, anda telah terdaftar.</div>';
	} else if ($dbs->error) {
		echo '<div class="errorBox">'.$dbs->error.'</div>';
	}	
}
?>
<align="center">
<form id="form1" name="form1" method="post"  enctype="multipart/form-data" action="index.php?p=form">
  <p><b>Online Member Registration</b><label></label>
    <label></label>
  </p>
  <table class="bordfer"  width="650" Height="1000" border="0">
    

    <tr>
     <td>NIM</td>
      <td><input name="member_id" type="text" id="member_id" size="20" maxlength="20" required/></td>
	  <td>tanpa tanda titik</td>
    </tr>

    <tr>
      <td>Nama Anggota</td>
      <td><input name="member_name" type="text" id="textfield3" size="40" required/></td>
      <td></td>
    </tr>
<tr>
      <td>Tanggal Lahir</td>
      <td><input name="birth_date" type="date" id="datepicker" size="10" maxlength="10" required/></td>
	  <td></td>
    </tr>
<tr>
      <td>Institusi</td>
      <td><input name="inst_name" type="text" id="textfield3" size="40" required/></td>
      <td></td>
    </tr>    
<tr>
      <td>Tipe Keanggotaan</td>
      <td><select id="lstbln" class="inputstyle" name="member_type_id">
                        <option selected="selected" value="1">Mahasiswa</option>
			<option  value="2">Dosen</option>
			<option value="5">Tendik</option>
			<option value="4">Umum</option>
                       
			</select></td>
			<td></td>
    </tr>
<tr>
      <td>Jenis Kelamin</td>
      <td><select id="lstbln" class="inputstyle" name="gender">
			<option selected="selected" value="1">Laki-Laki</option>
			<option value="0">Perempuan</option>
			</select></td>
			<td></td>
    </tr>
<tr>
      <td>Alamat</td>
      <td><textarea name="member_address" type="text" id="textfield3" cols="40" rows="5" required></textarea></td>
      <td></td>
    </tr>
<tr>
      <td>Kode Pos</td>
      <td><input name="postal_code" type="number" id="textfield3" size="40" /></td>
      <td></td>
    </tr>
<tr>
      <td>Nomor Telepon</td>
      <td><input name="member_phone" type="number" id="textfield3" size="40" required/></td>
	  <td></td>
    </tr>

<tr>
      <td>Email</td>
      <td><input name="member_email" type="text" id="textfield3" size="40" required/></td>
	  <td></td>
    </tr>

<tr>
      <td>Password</td>
      <td><input name="mpasswd" type="text" id="textfield3" size="40" required/></td>
	  <td></td>
    </tr>
	
           <td><input type="submit" name="daftarButton" id="button" value="Daftar" /><input type="reset" name="button" id="button" value="Reset" /></td>
      </tr>
  </table>
 </form>
</align>