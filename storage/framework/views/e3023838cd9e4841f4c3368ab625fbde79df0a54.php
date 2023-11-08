<?php
    $chatgpt = Utility::getValByName('enable_chatgpt');
?>

<?php echo e(Form::open(['url' => 'warning', 'method' => 'post'])); ?>

<div class="modal-body">

    <?php if($chatgpt == 'on'): ?>
    <div class="card-footer text-end">
        <a href="#" class="btn btn-sm btn-primary" data-size="medium" data-ajax-popup-over="true" data-url="<?php echo e(route('generate', ['warning'])); ?>"
            data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Generate')); ?>"
            data-title="<?php echo e(__('Generate Content With AI')); ?>">
            <i class="fas fa-robot"></i><?php echo e(__(' Generate With AI')); ?>

        </a>
    </div>
    <?php endif; ?>

    <div class="row">
        <?php if(\Auth::user()->type != 'employee'): ?>
            <div class="form-group col-md-6 col-lg-6">
                <?php echo e(Form::label('warning_by', __('Warning By'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::select('warning_by', $employees, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>

            </div>
        <?php endif; ?>
        <div class="form-group col-md-6 col-lg-6">
            <?php echo e(Form::label('warning_to', __('Warning To'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::select('warning_to', $employees, null, ['class' => 'form-control select2' ,'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-6 col-lg-6">
            <?php echo e(Form::label('subject', __('Subject'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('subject', null, ['class' => 'form-control' ,'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-6 col-lg-6">
            <?php echo e(Form::label('warning_date', __('Warning Date'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('warning_date', null, ['class' => 'form-control d_week current_date', 'autocomplete' => 'off' ,'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('description', __('Description'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Enter Description') ,'rows' => '3' ,'required' => 'required'])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">
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
</script><?php /**PATH /home/u489860297/domains/srdcindia.co.in/public_html/hrms/resources/views/warning/create.blade.php ENDPATH**/ ?>