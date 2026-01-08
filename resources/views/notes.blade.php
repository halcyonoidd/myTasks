@extends('layouts.app', ['title' => 'Notes - My Tasks'])

@section('content')
<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full transform transition-all duration-300 scale-95 opacity-0" id="editModalContent">
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-900">Edit Note</h3>
            <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="editForm" method="POST" class="p-6">
            @csrf
            @method('PUT')
            <div class="grid gap-4 text-sm">
                <div>
                    <label class="block text-slate-700 mb-1">Title</label>
                    <input id="editTitle" name="title" class="w-full rounded-lg border border-slate-200 px-3 py-2" required>
                </div>
                <div>
                    <label class="block text-slate-700 mb-1">Content</label>
                    <textarea id="editContent" name="content" rows="3" class="w-full rounded-lg border border-slate-200 px-3 py-2"></textarea>
                </div>
                <label class="inline-flex items-center gap-2 text-slate-700">
                    <input id="editPinned" type="checkbox" name="pinned" value="1" class="rounded border-slate-300">
                    Pinned
                </label>
            </div>
            <div class="flex gap-3 mt-6">
                <button type="button" onclick="closeEditModal()" class="flex-1 px-4 py-2.5 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-200">
                    Cancel
                </button>
                <button type="submit" class="flex-1 px-4 py-2.5 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                    Update Note
                </button>
            </div>
        </form>
    </div>
</div>

<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 transition-opacity duration-300">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
        <div class="p-6">
            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-amber-100 rounded-full">
                <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Delete Note?</h3>
            <p class="text-gray-600 text-center mb-6">Are you sure you want to delete this note? This action cannot be undone.</p>
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

<div class="flex items-center justify-between mb-6">
    <div>
        <p class="text-sm text-slate-500 text-white">Dashboard / Notes</p>
        <h1 class="text-2xl font-semibold text-white">Notes</h1>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-md border border-slate-100 overflow-hidden">
    <div class="px-6 py-4 bg-slate-50 border-b border-slate-200">
        <h2 class="text-lg font-semibold text-slate-800">Add New Note</h2>
    </div>
    <div class="px-6 py-6">
        <form method="POST" action="{{ route('notes.store') }}" class="grid gap-4 text-sm">
            @csrf
            <div>
                <label class="block text-slate-700 mb-1">Title</label>
                <input name="title" class="w-full rounded-lg border border-slate-200 px-3 py-2" required>
            </div>
            <div>
                <label class="block text-slate-700 mb-1">Content</label>
                <textarea name="content" rows="3" class="w-full rounded-lg border border-slate-200 px-3 py-2"></textarea>
            </div>
            <label class="inline-flex items-center gap-2 text-slate-700">
                <input type="checkbox" name="pinned" value="1" class="rounded border-slate-300">
                Pinned
            </label>
            <div class="flex justify-end">
                <button class="px-4 py-2 bg-gray-900 text-gray-200 rounded-lg hover:bg-blue-600 hover:text-gray-200 transition" type="submit">Save Note</button>
            </div>
        </form>
    </div>
</div>

<div class="mt-6 bg-white rounded-2xl shadow-md border border-slate-100 overflow-hidden">
    <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
        <h2 class="text-lg font-semibold text-slate-800">Notes</h2>
        <span class="text-sm text-slate-500">Total: {{ $notes?->total() ?? 0 }}</span>
    </div>
    <div class="divide-y divide-slate-100">
        @forelse($notes as $note)
            <article class="px-6 py-4 hover:bg-slate-50/70">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2">
                            <h3 class="text-base font-semibold text-slate-800">{{ $note->title }}</h3>
                            @if($note->pinned)
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-amber-100 text-amber-700">Pinned</span>
                            @endif
                        </div>
                        @if($note->content)
                            <p class="mt-1 text-sm text-slate-600 whitespace-pre-line">{{ $note->content }}</p>
                        @endif
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="text-xs text-slate-500 whitespace-nowrap">{{ $note->updated_at->format('d M Y H:i') }}</div>
                        <div class="flex gap-2">
                            <button type="button" onclick='openEditModal(@json($note))' class="text-xs px-2 py-1 rounded bg-blue-100 text-blue-700 hover:bg-blue-200 transition">Edit</button>
                            <form method="POST" action="{{ route('notes.delete', $note->id) }}" id="deleteForm{{ $note->id }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="openDeleteModal({{ $note->id }})" class="text-xs px-2 py-1 rounded bg-red-100 text-red-700 hover:bg-red-200 transition">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        @empty
            <div class="px-6 py-8 text-center text-slate-500">No notes yet.</div>
        @endforelse
    </div>
    @if($notes && $notes->hasPages())
        <div class="px-6 py-4 border-t border-slate-100">{{ $notes->links() }}</div>
    @endif
</div>

<script>
let currentDeleteFormId = null;

function openEditModal(note) {
    document.getElementById('editTitle').value = note.title || '';
    document.getElementById('editContent').value = note.content || '';
    document.getElementById('editPinned').checked = note.pinned || false;
    document.getElementById('editForm').action = '/notes/' + note.id;
    
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

function openDeleteModal(noteId) {
    currentDeleteFormId = 'deleteForm' + noteId;
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
