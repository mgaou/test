<form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Supprimer</button>
</form>