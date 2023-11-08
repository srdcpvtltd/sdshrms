<?php
    $chatgpt = Utility::getValByName('enable_chatgpt');
?>

<?php echo e(Form::open(['url' => 'ticket', 'method' => 'post'])); ?>

<div class="modal-body">

    <?php if($chatgpt == 'on'): ?>
        <div class="text-end">
            <a href="#" class="btn btn-sm btn-primary" data-size="medium" data-ajax-popup-over="true"
                data-url="<?php echo e(route('generate', ['ticket'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content With AI')); ?>">
                <i class="fas fa-robot"></i><?php echo e(__(' Generate With AI')); ?>

            </a>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="form-group">
            <?php echo e(Form::label('title', __('Subject'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter Ticket Subject')])); ?>

        </div>
        <?php if(\Auth::user()->type != 'employee'): ?>
            <div class="form-group">
                <?php echo e(Form::label('employee_id', __('Ticket for Employee'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::select('employee_id', $employees, null, ['class' => 'form-control select2 employee_id', 'placeholder' => __('Select Employee')])); ?>

            </div>
        <?php else: ?>
            <?php echo Form::hidden('employee_id', !empty($employees) ? $employees->id : 0, ['id' => 'employee_id']); ?>

        <?php endif; ?>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
                <div class="form-group">
                    <?php echo e(Form::label('priority', __('Priority'), ['class' => 'col-form-label'])); ?>

                    <select name="priority" class="form-control select2" id="choices-multiple">
                        <option value="low"><?php echo e(__('Low')); ?></option>
                        <option value="medium"><?php echo e(__('Medium')); ?></option>
                        <option value="high"><?php echo e(__('High')); ?></option>
                        <option value="critical"><?php echo e(__('critical')); ?></option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6">
                <div class="form-group">
                    <?php echo e(Form::label('end_date', __('End Date'), ['class' => 'col-form-label'])); ?>

                    <?php echo e(Form::text('end_date', null, ['class' => 'form-control d_week current_date', 'autocomplete' => 'off'])); ?>

                </div>
            </div>
        </div>

        <div class="form-group">
            <?php echo e(Form::label('description', __('Description'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Ticket Description'), 'rows' => '3'])); ?>

        </div>

        <div class="form-group">
            <?php echo e(Form::label('status', __('Status'), ['class' => 'col-form-label'])); ?>

            <select name="status" class="form-control  select2" id="status">
                <option value="close"><?php echo e(__('Close')); ?></option>
                <option value="open"><?php echo e(__('Open')); ?></option>
                <option value="onhold"><?php echo e(__('On Hold')); ?></option>
            </select>
        </div>

    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn  btn-primary">

</div>
<?php echo e(Form::close()); ?>


<script>
    $(document).ready(function() {
        var now = new Date();
        var month = (now.getMonth() + 1);
        var day = now.getDate();
        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;
        var today = now.getFullYear() + '-' + month + '-' + day;
        $('.current_date').val(today);
    });
</script>
<?php /**PATH /home/u768597266/domains/sdsmis.in/public_html/hrms/resources/views/ticket/create.blade.php ENDPATH**/ ?>