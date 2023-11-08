<?php
    $chatgpt = Utility::getValByName('enable_chatgpt');
?>

<?php echo e(Form::model($timeSheet, ['route' => ['timesheet.update', $timeSheet->id], 'method' => 'PUT'])); ?>

<div class="modal-body">

    <?php if($chatgpt == 'on'): ?>
    <div class="card-footer text-end">
        <a href="#" class="btn btn-sm btn-primary" data-size="medium" data-ajax-popup-over="true"
            data-url="<?php echo e(route('generate', ['timesheet'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
            title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content With AI')); ?>">
            <i class="fas fa-robot"></i><?php echo e(__(' Generate With AI')); ?>

        </a>
    </div>
    <?php endif; ?>

    <div class="row">
        <?php if(\Auth::user()->type != 'employee'): ?>
            <div class="form-group col-md-12">
                <?php echo e(Form::label('employee_id', __('Employee'), ['class' => 'col-form-label'])); ?>

                <?php echo Form::select('employee_id', $employees, null, ['class' => 'form-control font-style select2', 'id'=>'choices-multiple','required' => 'required']); ?>

            </div>
        <?php endif; ?>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('date', __('Date'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('date', null, ['class' => 'form-control d_week', 'autocomplete' => 'off', 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('hours', __('Hours'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::number('hours', null, ['class' => 'form-control', 'required' => 'required', 'step' => '0.01'])); ?>

        </div>
        <div class="form-group  col-md-12">
            <?php echo e(Form::label('remark', __('Remark'), ['class' => 'col-form-label'])); ?>

            <?php echo Form::textarea('remark', null, ['class' => 'form-control', 'rows' => '3' ,'placeholder'=>'Enter remark']); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn  btn-primary">

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/u768597266/domains/sdsmis.in/public_html/hrms/resources/views/timeSheet/edit.blade.php ENDPATH**/ ?>