<div class="cate-nav test">
	<!--
	<div class="top">
		<h1>Category</h1>
		<a href="#" class="cate-close"><img src="<?php echo(G5_IMG_URL); ?>/magific-close-btn.png" alt="Close button"></a>
	</div>
	-->
	<ul class="cate-main-nav">
		<?php
        // 1단계 분류 판매 가능한 것만
        $hsql = " select ca_id, ca_name from {$g5['g5_shop_category_table']} where length(ca_id) = '2' and ca_use = '1' order by ca_order, ca_id ";
        $hresult = sql_query($hsql);
        $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
        for ($i=0; $row=sql_fetch_array($hresult); $i++)
        {
            $gnb_zindex -= 1; // html 구조에서 앞선 gnb_1dli 에 더 높은 z-index 값 부여
            // 2단계 분류 판매 가능한 것만
            $sql2 = " select ca_id, ca_name from {$g5['g5_shop_category_table']} where LENGTH(ca_id) = '4' and SUBSTRING(ca_id,1,2) = '{$row['ca_id']}' and ca_use = '1' order by ca_order, ca_id ";
            $result2 = sql_query($sql2);
            $count = sql_num_rows($result2);
        ?>
        <li class="cate-main-list">
            <a href="<?php echo G5_SHOP_URL.'/list.php?ca_id='.$row['ca_id']; ?>"><?php echo $row['ca_name']; ?></a>
            <?php
            for ($j=0; $row2=sql_fetch_array($result2); $j++)
            {
            if ($j==0) echo '<ul class="cate-sub-nav">';
            ?>
                <li><a href="<?php echo G5_SHOP_URL; ?>/list.php?ca_id=<?php echo $row2['ca_id']; ?>"><?php echo $row2['ca_name']; ?></a></li>
            <?php }
            if ($j>0) echo '</ul>';
            ?>
        </li>
        <?php } ?>
	</ul>
</div>
