<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="text-center">
        <h3>All Users</h3>
    </div>
    <div>
        <a  class="btn btn-primary "href="<?php echo e(URL::to('rank/create')); ?>">Create Rank</a>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Code</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td><?php echo e($member->name); ?></td>
                                    <td><?php echo e($member->code); ?></td>
                                    <td><?php echo e($member->status); ?></td>
                                    <td>
                                        <a class="waves-effect waves-dark  btn btn-icon-only btn-danger delete tooltips"  ><i class="mdi mdi-account-edit"></i></a>
                                        <a class="waves-effect waves-dark  btn btn-icon-only btn-danger tooltips modal-show"  ><i class="mdi mdi-face-profile"></i></a>
                                       <button class="btn btn-icon-only btn-danger delete tooltips" title="Delete" type="submit" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                                <i class="mdi mdi-delete-sweep"></i></button>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($user->links()); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH K:\server\htdocs\laravelProject\resources\views/rank/index.blade.php ENDPATH**/ ?>