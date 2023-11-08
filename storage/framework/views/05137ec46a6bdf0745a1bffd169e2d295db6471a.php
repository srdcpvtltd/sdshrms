<?php
    $chatgpt = Utility::getValByName('enable_chatgpt');
?>


<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Ticket Reply')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 "><?php echo e(__('Ticket Reply')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(url('ticket')); ?>"><?php echo e(__('Ticket')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Ticket Reply')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-button'); ?>
    <?php if(\Auth::user()->type == 'company' || $ticket->ticket_created == \Auth::user()->id): ?>
        <div class="float-end">
            <a href="#" data-size="lg" data-url="<?php echo e(URL::to('ticket/' . $ticket->id . '/edit')); ?>"
                data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>"
                data-title="<?php echo e(__('Edit Ticket')); ?>" class="btn btn-sm btn-primary">
                <i class="ti ti-pencil"></i>
            </a>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="row">
                        <h5 class="mb-3"><?php echo e(__('Reply Ticket')); ?> - <span
                                class="text-success"><?php echo e($ticket->ticket_code); ?></span></h5>
                        <div class="card border">
                            <div class="card-body p-0">
                                <div class="p-4 border-bottom">

                                    <?php if($ticket->priority == 'medium'): ?>
                                        <div class="badge bg-info mb-2"><?php echo e(__('Medium')); ?></div>
                                    <?php elseif($ticket->priority == 'low'): ?>
                                        <div class="badge bg-success mb-2"><?php echo e(__('Low')); ?>

                                        </div>
                                    <?php elseif($ticket->priority == 'high'): ?>
                                        <div class="badge bg-warning mb-2"><?php echo e(__('High')); ?>

                                        </div>
                                    <?php elseif($ticket->priority == 'critical'): ?>
                                        <div class="badge bg-danger mb-2"><?php echo e(__('Critical')); ?>

                                        </div>
                                    <?php endif; ?>

                                    <div class="d-flex justify-content-between align-items-center ">
                                        <h5><?php echo e($ticket->title); ?></h5>
                                        <?php if($ticket->status == 'open'): ?>
                                            <span class="badge bg-light-primary p-2 f-w-600 text-primary rounded">
                                                <?php echo e(__('Open')); ?></span>
                                        <?php elseif($ticket->status == 'close'): ?>
                                            <span class="badge bg-light-danger p-2 f-w-600 text-danger rounded">
                                                <?php echo e(__('Closed')); ?></span>
                                        <?php elseif($ticket->status == 'onhold'): ?>
                                            <span class="badge bg-light-warning p-2 f-w-600 text-warning rounded">
                                                <?php echo e(__('On Hold')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="mb-0">
                                        <b> <?php echo e(!empty($ticket->createdBy) ? $ticket->createdBy->name : ''); ?></b>
                                        .
                                        <span> <?php echo e(!empty($ticket->createdBy) ? $ticket->createdBy->email : ''); ?></span>
                                        .
                                        <span
                                            class="text-muted"><?php echo e(\Auth::user()->dateFormat($ticket->created_at)); ?></span>
                                    </p>
                                </div>
                                <?php if(!empty($ticket->description)): ?>
                                    <div class="p-4">
                                        <p class=""><?php echo e($ticket->description); ?></p>
                                        <?php if(!empty($ticket->attachment)): ?>
                                            <h6><?php echo e(__('Attachments')); ?> :</h6>
                                            <a href="<?php echo e(asset(Storage::url('uploads/supports')) . '/' . $ticket->attachment); ?>"
                                                download="" class="bg-secondary d-inline-flex p-2 rounded text-white "
                                                target="_blank">
                                                <i class="ti ti-download text-white me-2 mt-1" data-bs-toggle="tooltip"></i>

                                                <?php echo e($ticket->attachment); ?>

                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php if($ticket->status == 'open'): ?>
                        <div class="row">
                            <div class="card">
                                <div class="card-body">

                                    <?php if($chatgpt == 'on'): ?>
                                        <div class="text-end">
                                            <a href="#" data-size="md" class="btn btn-primary btn-icon btn-sm"
                                                data-ajax-popup-over="true" id="grammarCheck"
                                                data-url="<?php echo e(route('grammar', ['grammar'])); ?>" data-bs-placement="top"
                                                data-title="<?php echo e(__('Grammar check with AI')); ?>">
                                                <i class="ti ti-rotate"></i> <span><?php echo e(__('Grammar check with AI')); ?></span>
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <h5 class="mb-3"><?php echo e(__('Comments')); ?></h5>
                                    <?php echo e(Form::open(['url' => 'ticket/changereply', 'method' => 'post'])); ?>

                                    <input type="hidden" value="<?php echo e($ticket->id); ?>" name="ticket_id">
                                    <textarea class="form-control form-control-light mb-2 grammer_textarea" name="description" placeholder="Your comment"
                                        id="example-textarea" rows="3" required=""></textarea>
                                    <div class="text-end">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-sm bg-primary w-100" style="color: white"> <i
                                                    class="ti ti-circle-plus me-1 mb-0"></i> <?php echo e(__('Send')); ?></button>
                                        </div>
                                    </div>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-6">
                    <h5 class="mb-3"><?php echo e(__('Replies')); ?></h5>
                    <?php $__currentLoopData = $ticketreply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="card border">
                            <div class="card-header row d-flex align-items-center justify-content-between">
                                <div class="header-right col d-flex align-items-start">
                                    <a href="#" class="avatar avatar-sm me-3">
                                        <img alt="" class="support-user"
                                            <?php if(!empty($reply->users) && !empty($reply->users->avatar)): ?> src="<?php echo e(asset(Storage::url('uploads/avatar/')) . '/' . $reply->users->avatar); ?>" <?php else: ?>  src="<?php echo e(asset(Storage::url('uploads/avatar/')) . '/avatar.png'); ?>" <?php endif; ?>>
                                    </a>
                                    <h6 class="mb-0"><?php echo e(!empty($reply->users) ? $reply->users->name : ''); ?>

                                        <div class="d-block text-muted">
                                            <?php echo e(!empty($reply->users) ? $reply->users->email : ''); ?>

                                        </div>
                                    </h6>
                                </div>
                                <p class="col-auto ms-1 mb-0"> <span
                                        class="text-muted"><?php echo e($reply->created_at->diffForHumans()); ?></span></p>
                            </div>
                            <div class="card-body">
                                <p class="mb-0"><?php echo e($reply->description); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u768597266/domains/sdsmis.in/public_html/hrms/resources/views/ticket/reply.blade.php ENDPATH**/ ?>