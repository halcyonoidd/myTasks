@extends('layouts.app', ['title' => 'Wishlist - My Tasks'])

@section('content')
<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full transform transition-all duration-300 scale-95 opacity-0" id="editModalContent">
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-900">Edit Wishlist Item</h3>
            <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="editForm" method="POST" class="p-6">
            @csrf
            @method('PUT')
            <div class="grid md:grid-cols-2 gap-4 text-sm">
                <div>
                    <label class="block text-slate-700 mb-1">Title</label>
                    <input id="editTitle" name="title" class="w-full rounded-lg border border-slate-200 px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-slate-700 mb-1">URL</label>
                    <input id="editUrl" name="url" class="w-full rounded-lg border border-slate-200 px-3 py-2" placeholder="https://...">
                </div>
                <div>
                    <label class="block text-slate-700 mb-1">Estimated Price</label>
                    <input id="editEstimatedPrice" type="number" step="0.01" name="estimated_price" class="w-full rounded-lg border border-slate-200 px-3 py-2">
                </div>
                <label class="inline-flex items-center gap-2 text-slate-700">
                    <input id="editPurchased" type="checkbox" name="purchased" value="1" class="rounded border-slate-300">
                    Purchased
                </label>
                <div class="md:col-span-2">
                    <label class="block text-slate-700 mb-1">Description</label>
                    <textarea id="editDescription" name="description" rows="2" class="w-full rounded-lg border border-slate-200 px-3 py-2"></textarea>
                </div>
            </div>
            <div class="flex gap-3 mt-6">
                <button type="button" onclick="closeEditModal()" class="flex-1 px-4 py-2.5 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-200">
                    Cancel
                </button>
                <button type="submit" class="flex-1 px-4 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                    Update Item
                </button>
            </div>
        </form>
    </div>
</div>

<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
        <div class="p-6">
            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-emerald-100 rounded-full">
                <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Delete Wishlist Item?</h3>
            <p class="text-gray-600 text-center mb-6">Are you sure you want to delete this item from wishlist? This action cannot be undone.</p>
            <div class="flex gap-3">
                <button onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-200 transform hover:scale-105">
                    Cancel
                </button>
                <button onclick="confirmDelete()" class="flex-1 px-4 py-2.5 bg-red-600 text-white rounded-xl font-semibold hover:bg-red-700 transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<div class="mb-8">
    <section class="bg-blue">
            <div class="bg-blue-600 px-6 py-4 rounded-2xl shadow-md">
                <p class="text-sm text-white">Dashboard/Wishlist</p>
                <h1 class="text-2xl font-semibold text-white">Show Us Your Wishlist Here!</h1>
                
                <div class="text-sm text-white text-right">Last update: {{ now()->format('d M Y, H:i') }}</div>
            </div>
    </section>
</div>

<div class="bg-white rounded-2xl shadow-md border border-slate-100 overflow-hidden">
    <div class="px-6 py-4 bg-slate-50 border-b border-slate-200">
        <h2 class="text-lg font-semibold text-slate-800">Add Wishlist Item</h2>
    </div>
    <div class="px-6 py-6">
        <form method="POST" action="{{ route('wishlist.store') }}" class="grid md:grid-cols-2 gap-4 text-sm">
            @csrf
            <div>
                <label class="block text-slate-700 mb-1">Title</label>
                <input name="title" class="w-full rounded-lg border border-slate-200 px-3 py-2" required>
            </div>
            <div>
                <label class="block text-slate-700 mb-1">URL</label>
                <input name="url" class="w-full rounded-lg border border-slate-200 px-3 py-2" placeholder="https://...">
            </div>
            <div>
                <label class="block text-slate-700 mb-1">Estimated Price</label>
                <input type="number" step="0.01" name="estimated_price" class="w-full rounded-lg border border-slate-200 px-3 py-2">
            </div>
            <label class="inline-flex items-center gap-2 text-slate-700">
                <input type="checkbox" name="purchased" value="1" class="rounded border-slate-300">
                Purchased
            </label>
            <div class="md:col-span-2">
                <label class="block text-slate-700 mb-1">Description</label>
                <textarea name="description" rows="2" class="w-full rounded-lg border border-slate-200 px-3 py-2"></textarea>
            </div>
            <div class="md:col-span-2 flex justify-end">
                <button class="px-4 py-2 bg-gray-900 text-gray-200 rounded-lg hover:bg-blue-600 hover:text-gray-200 transition" type="submit">Save Item</button>
            </div>
        </form>
    </div>
</div>

<div class="mt-6 bg-white rounded-2xl shadow-md border border-slate-100 overflow-hidden">
    <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
        <h2 class="text-lg font-semibold text-slate-800">Wishlist Items</h2>
        <span class="text-sm text-slate-500">Total: {{ $items?->total() ?? 0 }}</span>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-slate-600">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold">Title</th>
                    <th class="px-6 py-3 text-left font-semibold">URL</th>
                    <th class="px-6 py-3 text-left font-semibold">Estimate</th>
                    <th class="px-6 py-3 text-left font-semibold">Status</th>
                    <th class="px-6 py-3 text-left font-semibold">Updated</th>
                    <th class="px-6 py-3 text-left font-semibold">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($items as $item)
                    <tr class="hover:bg-slate-50/70">
                        <td class="px-6 py-3">
                            <div class="font-semibold text-slate-800">{{ $item->title }}</div>
                            @if($item->description)
                                <div class="text-xs text-slate-500 line-clamp-2">{{ $item->description }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-sky-600 truncate max-w-[200px]">
                            @if($item->url)
                                <a href="{{ $item->url }}" class="hover:underline" target="_blank" rel="noreferrer">{{ $item->url }}</a>
                            @else
                                <span class="text-slate-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-slate-700">
                            {{ $item->estimated_price ? 'Rp ' . number_format($item->estimated_price, 0, ',', '.') : '-' }}
                        </td>
                        <td class="px-6 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $item->purchased ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-700' }}">
                                {{ $item->purchased ? 'Purchased' : 'Pending' }}
                            </span>
                        </td>
                        <td class="px-6 py-3 text-slate-500 text-xs">{{ $item->updated_at->format('d M Y H:i') }}</td>
                        <td class="px-6 py-3">
                            <div class="flex gap-2">
                                <button type="button" onclick='openEditModal(@json($item))' class="text-xs px-2 py-1 rounded bg-blue-100 text-blue-700 hover:bg-blue-200 transition">Edit</button>
                                <form method="POST" action="{{ route('wishlist.delete', $item->id) }}" id="deleteForm{{ $item->id }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="openDeleteModal({{ $item->id }})" class="text-xs px-2 py-1 rounded bg-red-100 text-red-700 hover:bg-red-200 transition">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-6 text-center text-slate-500">No wishlist items yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($items && $items->hasPages())
        <div class="px-6 py-4 border-t border-slate-100">{{ $items->links() }}</div>
    @endif
</div>

<script>
let currentDeleteFormId = null;

function openEditModal(item) {
    document.getElementById('editTitle').value = item.title || '';
    document.getElementById('editUrl').value = item.url || '';
    document.getElementById('editEstimatedPrice').value = item.estimated_price || '';
    document.getElementById('editPurchased').checked = item.purchased || false;
    document.getElementById('editDescription').value = item.description || '';
    document.getElementById('editForm').action = '/wishlist/' + item.id;
    
    const modal = document.getElementById('editModal');
    const modalContent = document.getElementById('editModalContent');
    
    modal.classList.remove('hidden');
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeEditModal() {
    const modal = document.getElementById('editModal');
    const modalContent = document.getElementById('editModalContent');
    
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

function openDeleteModal(itemId) {
    currentDeleteFormId = 'deleteForm' + itemId;
    const modal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('modalContent');
    
    modal.classList.remove('hidden');
    setTimeout(() => {
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    const modalContent = document.getElementById('modalContent');
    
    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-95', 'opacity-0');
    
    setTimeout(() => {
        modal.classList.add('hidden');
        currentDeleteFormId = null;
    }, 300);
}

function confirmDelete() {
    if (currentDeleteFormId) {
        document.getElementById(currentDeleteFormId).submit();
    }
}

document.getElementById('deleteModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeDeleteModal();
        closeEditModal();
    }
});

document.getElementById('editModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeEditModal();
    }
});
</script>
@endsection
