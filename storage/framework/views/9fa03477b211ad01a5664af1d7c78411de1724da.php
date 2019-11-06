<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="text-center">
        <h3>All Users</h3>
    </div>
    <div >
        <?php echo e(Form::open(['url'=>'rank/filter','method'=>'post'])); ?>

            <div class="d-flex">
                <div class="form-group col-md-4"> 
                    <?php echo e(Form::text('text',null,['class'=>'form-control'])); ?>

                </div>
                <div class=" col form-group">
                    <?php echo e(Form::submit('Search',['class' => 'btn btn-primary'])); ?>

                </div>
                
            </div>
        <?php echo e(Form::Close()); ?>

    </div>
    <div class=" col form-group">
                    <a  class="btn btn-primary "href="<?php echo e(URL::to('rank/export')); ?>">excel</a>
                </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-block">
                    <?php echo $__env->make('defaults.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="table-responsive">
                        <div class="pull-right">
                            <a  class="btn btn-primary "href="<?php echo e(URL::to('rank/create')); ?>">Create Rank</a>
                        </div>
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
                                <?php $__currentLoopData = $rankList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ranks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td><?php echo e($ranks->name); ?></td>
                                    <td><?php echo e($ranks->code); ?></td>
                                    <td>
                                        <?php
                                        $label = '';
                                        if ($ranks->status == '1') {
                                            $label = 'label-success';
                                        } else if ($ranks->status == '2') {
                                            $label = 'label-danger';
                                        }
                                        ?>
                                        <span class="label <?php echo e($label); ?>">
                                            <?php echo e(isset($ranks->status) && isset($statusArr[$ranks->status]) ? $statusArr[$ranks->status] : ''); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <div>
                                            <?php echo e(Form::open(array('url' => 'rank/' . $ranks->id))); ?>

                                            <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                                            <a class="waves-effect waves-dark  btn btn-icon-only btn-danger  tooltips" href="<?php echo e(URL::to('rank/'.$ranks->id.'/edit'.Helper::pageDefine($pageArr))); ?>" >
                                                <i class="mdi mdi-account-edit"></i></a>
                                            <a class="btn btn-icon-only btn-info  tooltips" data-placement="top" data-rel="tooltip" href="<?php echo e(URL::to('rank?id='.$ranks->id.'&view=pdf')); ?>"> 
                                                <i class="mdi mdi-file-pdf"></i></a>
                                            <button class="btn btn-icon-only btn-success delete tooltips" title="Delete" type="submit" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                                <i class="mdi mdi-delete-sweep"></i>
                                            </button>
                                            <?php echo e(Form::close()); ?>


                                        </div>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                        <div class="pull-right">
                            <?php echo e($rankList->links()); ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH K:\server\htdocs\laravelProject\resources\views/rank/index.blade.php ENDPATH**/ ?>