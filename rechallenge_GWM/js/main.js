// 'use strict'

$(function() {
  $clear = $('.clear');
  $remove_comment = $('.remove_button');
  $comment = $('textarea');
  $time = $('option');
  $submit = $('.insert');
  $show_count = $('.show_count');
  $err_msg = $('.error');
  $updated_at = $('updated_at').val();

  $clear.on('click', function() {
    $comment.text("");
    $time.removeAttr("selected");
  });

  $remove_comment.on('click', function() {
    $comment.val("");
  });

  $submit.on('click', function(e) {
    if ($comment.val().length > 30) {
      e.preventDefault();

      $err_msg.addClass('active');
      $err_msg.text('用件が30文字を超えています!');
    }
  });

  $comment.on('keyup', function() {
    $inputtext = $(this).val().length;
    $show_count.text($inputtext);
  });

});