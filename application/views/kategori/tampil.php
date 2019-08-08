<?php foreach ($tampil as $key => $value): ?>
	<tr>
		<td><?=$value->id_kategori?></td>
		<td><?=$value->nama_kategori?></td>
		<td>
			<a href="#" onclick="edit('<?=$value->id_kategori?>')" class="btn-xs btn-warning" title="edit" ><i class="fa fa-pencil"></i></a>
			<a href="#" onclick="hapusCoy('<?=$value->id_kategori?>')" class="btn-xs btn-danger" title="hapus" ><i class="fa fa-trash"></i></a>
		</td>
	</tr>
<?php endforeach ?>