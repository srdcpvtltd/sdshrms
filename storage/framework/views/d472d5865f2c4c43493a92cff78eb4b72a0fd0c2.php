

<div class="modal-body">
    <div class="row py-4">
        <div class="col-md-12 ">
            <div class="info text-sm">
                <strong><?php echo e(__('Branch')); ?> : </strong>
                <span><?php echo e(!empty($indicator->branches) ? $indicator->branches->name : ''); ?></span>
            </div>
        </div>
        <div class="col-md-6 mt-2">
            <div class="info text-sm font-style">
                <strong><?php echo e(__('Department')); ?> : </strong>
                <span><?php echo e(!empty($indicator->departments) ? $indicator->departments->name : ''); ?></span>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="info text-sm font-style">
                <strong><?php echo e(__('Designation')); ?> : </strong>
                <span><?php echo e(!empty($indicator->designations) ? $indicator->designations->name : ''); ?></span>
            </div>
        </div>

    </div>
    <div class="row">
        <?php $__currentLoopData = $performance_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $performances): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12 mt-3">
                <h6><?php echo e($performances->name); ?></h6>
                <hr class="mt-0">
            </div>
            <?php $__currentLoopData = $performances->types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6">
                    <?php echo e($types->name); ?>

                </div>
                <div class="col-6">
                    <fieldset id='demo1' class="rate">
                        <input class="stars" type="radio" id="technical-5-<?php echo e($types->id); ?>"
                            name="rating[<?php echo e($types->id); ?>]" value="5"
                            <?php echo e(isset($ratings[$types->id]) && $ratings[$types->id] == 5 ? 'checked' : ''); ?> disabled>
                        <label class="full" for="technical-5-<?php echo e($types->id); ?>"
                            title="Awesome - 5 stars"></label>
                        <input class="stars" type="radio" id="technical-4-<?php echo e($types->id); ?>"
                            name="rating[<?php echo e($types->id); ?>]" value="4"
                            <?php echo e(isset($ratings[$types->id]) && $ratings[$types->id] == 4 ? 'checked' : ''); ?> disabled>
                        <label class="full" for="technical-4-<?php echo e($types->id); ?>"
                            title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="technical-3-<?php echo e($types->id); ?>"
                            name="rating[<?php echo e($types->id); ?>]" value="3"
                            <?php echo e(isset($ratings[$types->id]) && $ratings[$types->id] == 3 ? 'checked' : ''); ?> disabled>
                        <label class="full" for="technical-3-<?php echo e($types->id); ?>"
                            title="Meh - 3 stars"></label>
                        <input class="stars" type="radio" id="technical-2-<?php echo e($types->id); ?>"
                            name="rating[<?php echo e($types->id); ?>]" value="2"
                            <?php echo e(isset($ratings[$types->id]) && $ratings[$types->id] == 2 ? 'checked' : ''); ?> disabled>
                        <label class="full" for="technical-2-<?php echo e($types->id); ?>"
                            title="Kinda bad - 2 stars"></label>
                        <input class="stars" type="radio" id="technical-1-<?php echo e($types->id); ?>"
                            name="rating[<?php echo e($types->id); ?>]" value="1"
                            <?php echo e(isset($ratings[$types->id]) && $ratings[$types->id] == 1 ? 'checked' : ''); ?> disabled>
                        <label class="full" for="technical-1-<?php echo e($types->id); ?>"
                            title="Sucks big time - 1 star"></label>
                    </fieldset>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH /home/u489860297/domains/srdcindia.co.in/public_html/hrms/resources/views/indicator/show.blade.php ENDPATH**/ ?>