<a href="{{ route('toko.edit', $toko->id) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('toko.destroy', $toko->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus toko ini?')">Hapus</button>
</form>
