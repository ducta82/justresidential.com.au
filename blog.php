<?php include('includes/header.php');?>
	<div class="img-header">
		<img src="images/slide_blog.png" class="img-responsive" alt="Image">
		<h2 class="title-img-header">blog</h2>
	</div>
</div><!-- end header-->
<div class="blog-page">
	<div class="container content">
		<div class="head-page">
			<h2>Pellentesque habitant morbi tristique</h2>
			<div class="border-page"></div>	
		</div>
		<section class="col-xs-12 col-sm-9 col-md-9 col-lg-9 box-posts-page">
			<?php include('includes/post-teamplate.php');?>
		</section>
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 widget-right">
			<div class="search-box">
				<input type="search" name="s" id="inputS" class="form-control search-input" placeholder="Keyword" value="" required="required" title="">
			</div>
			<article class="archive-month">
				<h3>archives</h3>
				<ul>
					<li><a href="javascript:void(0)">January 2015</a></li>
					<li><a href="javascript:void(0)">February 2015</a></li>
					<li><a href="javascript:void(0)">March 2015</a></li>
					<li><a href="javascript:void(0)">April 2015</a></li>
					<li><a href="javascript:void(0)">May 2015</a></li>
					<li><a href="javascript:void(0)">July 2015</a></li>
					<li><a href="javascript:void(0)">June 2015</a></li>
					<li><a href="javascript:void(0)">August 2015</a></li>
					<li><a href="javascript:void(0)">September 2015</a></li>
					<li><a href="javascript:void(0)">October 2015</a></li>
					<li><a href="javascript:void(0)">November 2015</a></li>
					<li><a href="javascript:void(0)">December 2015</a></li>
				</ul>
			</article>
		</div>
	</div><!--end container content-->
</div><!--end blog-page-->
<?php include('includes/footer.php');?>