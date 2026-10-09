<?php $__env->startSection('title', 'Daftar Buku'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Daftar Buku</h3>
    <a href="<?php echo e(route('books.create')); ?>" class="btn btn-primary">+ Tambah Buku</a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0 align-middle">
            <thead class="table-dark">
                <tr><th>#</th><th>Judul</th><th>Penulis</th><th>Kategori</th><th>Tahun</th><th>Stok</th><th class="text-end">Aksi</th></tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($books->firstItem() + $loop->index); ?></td>
                    <td><?php echo e($book->title); ?></td>
                    <td><?php echo e($book->author); ?></td>
                    <td><span class="badge text-bg-info"><?php echo e($book->category->name); ?></span></td>
                    <td><?php echo e($book->published_year); ?></td>
                    <td><?php echo e($book->stock); ?></td>
                    <td class="text-end">
                        <a href="<?php echo e(route('books.edit', $book)); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?php echo e(route('books.destroy', $book)); ?>" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus buku ini?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="7" class="text-center text-muted py-4">Belum ada buku.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3"><?php echo e($books->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\mini-perpus\resources\views/books/index.blade.php ENDPATH**/ ?>