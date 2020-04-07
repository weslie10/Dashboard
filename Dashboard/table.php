<?php
include "header.php";
?>
<section id="main-content">
	<div class="form">
		<div class="cards">
			<div class="card">
				<h1>Table User</h1>
				<table>
					<thead>
						<tr>
							<th>Id</th>
							<th>Username</th>
							<th>Password</th>
							<th colspan="2" style="text-align: center;">
								Action
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>asdf</td>
							<td>123</td>
							<td style="text-align: center;">
								<a href="aksi.php?ket=update&id=1">Update</a>
							</td>
							<td style="text-align: center;">
								<a href="aksi.php?ket=delete&id=1">Delete</a>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>weslie</td>
							<td>1</td>
							<td style="text-align: center;">
								<a href="aksi.php?ket=update&id=2">Update</a>
							</td>
							<td style="text-align: center;">
								<a href="aksi.php?ket=delete&id=2">Delete</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<?php
    include "footer.php";
?>
