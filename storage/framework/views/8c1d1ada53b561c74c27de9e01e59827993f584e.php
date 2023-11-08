<?php echo e(Form::open(['url' => 'custom-question', 'method' => 'post'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group">
            <?php echo e(Form::label('question', __('Question'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('question', null, ['class' => 'form-control', 'placeholder' => __('Enter question')])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('is_required', __('Is Required'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::select('is_required', $is_required, null, ['class' => 'form-control select2','required' => 'required'])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn  btn-primary">

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/u489860297/domains/srdcindia.co.in/public_html/hrms/resources/views/customQuestion/create.blade.php ENDPATH**/ ?>