<?php foreach ($tampil as $key => $value): ?>
	<tr>
		<td><?=$value->nama_kategori?></td>
		<td><?=$value->nama_subkategori?></td>
		<td><?=$value->kode_barang?></td>
		<td><?=$value->nama_barang?></td>
		<td>
			<a href="#" onclick="edit('<?=$value->id_barang?>')" class="btn-xs btn-warning" title="edit" ><i class="fa fa-pencil"></i></a>
			<a href="#" onclick="hapusCoy('<?=$value->id_barang?>')" class="btn-xs btn-danger" title="hapus" ><i class="fa fa-trash"></i></a>
		</td>
	</tr>
<?php endforeach ?>