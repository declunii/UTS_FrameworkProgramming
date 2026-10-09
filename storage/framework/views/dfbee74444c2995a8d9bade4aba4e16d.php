<?php $__env->startSection('title', 'Daftar Kategori'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Daftar Kategori</h3>
    <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-primary">+ Tambah Kategori</a>
</div>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped table-hover mb-0 align-middle">
            <thead class="table-dark">
                <tr><th>#</th><th>Nama</th><th>Deskripsi</th><th>Jumlah Buku</th><th class="text-end">Aksi</th></tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($categories->firstItem() + $loop->index); ?></td>
                    <td><?php echo e($category->name); ?></td>
                    <td><?php echo e($category->description ?? '-'); ?></td>
                    <td><span class="badge text-bg-secondary"><?php echo e($category->books_count); ?></span></td>
                    <td class="text-end">
                        <a href="<?php echo e(route('categories.edit', $category)); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?php echo e(route('categories.destroy', $category)); ?>" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus kategori ini?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada kategori.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3"><?php echo e($categories->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\mini-perpus\resources\views/categories/index.blade.php ENDPATH**/ ?>