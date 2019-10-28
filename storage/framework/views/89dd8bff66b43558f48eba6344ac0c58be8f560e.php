<?php $__env->startSection('content'); ?>

<div>
    <?php echo e(Form::open(['url' => 'filter','method' => 'post'])); ?>

            <?php echo csrf_field(); ?>
            <div class="d-flex  ">
                    <div class="  form-group col-md-10">
                        
                        <?php echo e(Form::text('text', Request::get('search'),['class' => 'form-control'])); ?>


                    </div>
                    <div class="form-group  col">
                        
                        <?php echo e(Form::submit('Search',['class' => 'btn btn-primary'])); ?>

                    </div>
                </div>
    <?php echo e(Form::close()); ?>

</div>
<div class="text-center">
    
    <h3>All Users</h3>
</div>
<div class="row">
    <div class="col-md-12">
        <?php echo $__env->make('defaults.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card">
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Hobby</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                            <?php if(!$users->isEmpty()): ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                            <tr>
                                <td><img src="<?php echo e(asset('public/image/'.$user->image)); ?>" alt="<?php echo e($user->first_name); ?>" width="50px" height="50px" /></td>
                                <td><?php echo e($user->first_name); ?></td>
                                <td><?php echo e($user->last_name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->gender); ?></td>
                                <td><?php echo e($user->phone); ?></td>
                                <td><?php echo e($user->hobby); ?></td>
                                <td><?php echo e($user->address); ?></td>
                                <td><?php echo e($user->country); ?></td>
                                <td><?php echo e($user->status); ?></td>
                                <td>  
                                     <div>
                                        <?php echo e(Form::open(array('url' => 'user/' . $user->id))); ?>

                                        <?php echo e(Form::hidden('_method', 'DELETE')); ?>


                                        <a class="waves-effect waves-dark  btn btn-icon-only btn-danger delete tooltips" href="<?php echo e(route('user.edit',$user->id)); ?>" ><i class="mdi mdi-account-edit"></i></a>
                                        <a class="waves-effect waves-dark  btn btn-icon-only btn-danger delete tooltips" href="<?php echo e(route('user.show',$user->id)); ?>" ><i class="mdi mdi-face-profile"></i></a>
                                        <button class="btn btn-icon-only btn-danger delete tooltips" title="Delete" type="submit" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                            <i class="mdi mdi-delete-sweep"></i>
                                        </button>
                                        <?php echo e(Form::close()); ?>

                                    </div>
                                      
                                </td>
                            </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <?php echo e($users->links()); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH K:\server\htdocs\laravelProject\resources\views/user/viewUser.blade.php ENDPATH**/ ?>