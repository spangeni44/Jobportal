<nav aria-label="Page navigation">
                        <ul class="pagination">
                        <?php if($curpage != $startpage){ ?>
                            <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">First</span>
                            </a>
                            </li>
                            <?php } ?>
                            <?php if($curpage >= 2){ ?>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
                            <?php } ?>
                            <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
                            <?php if($curpage != $endpage){ ?>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
                            <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Last</span>
                            </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>