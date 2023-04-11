function insertPagination($base_url, $cur_page, $number_of_pages, $prev_next=false) {
    $ends_count = 1; 
    $middle_count = 2; 
    $dots = false;
    ?>
    <ul class="pagination">
    <?php
    if ($prev_next && $cur_page && 1 < $cur_page) {  //print previous button?
         ?><li class="page-item prev"><a class="prev page-link" href="<?php echo $base_url.'/blog/'; ?>?page_num=<?php echo $cur_page-1; ?>">&laquo; </a></li><?php
    }
    for ($i = 1; $i <= $number_of_pages; $i++) {
         if ($i == $cur_page) {
              ?><li class="page-item active"><a class="page-link" ><?php echo $i; ?></a></li><?php
              $dots = true;
         } else {
              if ($i <= $ends_count || ($cur_page && $i >= $cur_page - $middle_count && $i <= $cur_page + $middle_count) || $i > $number_of_pages - $ends_count) { 
                   ?><li class="page-item " ><a class="page-link" href="<?php echo $base_url.'/blog/'; ?>?page_num=<?php echo $i; ?>"><?php echo $i; ?></a></li><?php
                   $dots = true;
              } elseif ($dots) {
                   ?><li class="page-item" ><a class="page-link" >&hellip;</a></li><?php
                   $dots = false;
              }
         }
    }
    if ($prev_next && $cur_page && ($cur_page < $number_of_pages || -1 == $number_of_pages)) { //print next button?
         ?><li class="page-item next"><a href="<?php echo $base_url.'/blog/'; ?>?page_num=<?php echo $cur_page+1; ?>"> &raquo;</a></li><?php
    }
    ?>
    </ul>
    <?php
}