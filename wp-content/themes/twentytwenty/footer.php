<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
			<footer id="site-footer" role="contentinfo" class="header-footer-group">

				<div class="section-inner">

					<div class="footer-credits">

						<p class="footer-copyright">&copy;
							<?php
							echo date_i18n(
								/* translators: Copyright date format, see https://secure.php.net/date */
								_x( 'Y', 'copyright date format', 'twentytwenty' )
							);
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						</p><!-- .footer-copyright -->

						<p class="powered-by-wordpress">
							<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentytwenty' ) ); ?>">
								<?php _e( 'Powered by WordPress', 'twentytwenty' ); ?>
							</a>
						</p><!-- .powered-by-wordpress -->

					</div><!-- .footer-credits -->

					<a class="to-the-top" href="#site-header">
						<span class="to-the-top-long">
							<?php
							/* translators: %s: HTML character for up arrow */
							printf( __( 'To the top %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
							?>
						</span><!-- .to-the-top-long -->
						<span class="to-the-top-short">
							<?php
							/* translators: %s: HTML character for up arrow */
							printf( __( 'Up %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
							?>
						</span><!-- .to-the-top-short -->
					</a><!-- .to-the-top -->

				</div><!-- .section-inner -->

			</footer><!-- #site-footer -->

		<?php wp_footer(); ?>
		<script type="text/javascript"> 
		  $(document).ready(function(){
		  	$('.next').hide();
			 $('#datetimepicker1').datetimepicker({
			    format: 'YYYY-MM-DD',
			  });

			$('input[type=radio][name=partner]').change(function(){
			  if($(this).val() == "Yes"){
			    $('#typeName').prop("disabled", false);
			  }else{
			    $('#typeName').prop("disabled", true);
			    $('#typeName').val("");
			  }
			});

			$('input#date').focus(function(){
			    if($('input#date').val() == "" || $('input#onDutyTime').val() == "" || 
			                               $('input#offDutyTime').val() == "")
			    {
			      $('#next').hide();
			    }else{
			      $('#next').show();
			    }
			  });

			  $('input#onDutyTime').focus(function(){
			    if($('input#date').val() == "" || $('input#onDutyTime').val() == "" || 
			                             $('input#offDutyTime').val() == "")
			    {
			      $('#next').hide();
			    }else{
			      $('#next').show();
			    }
			  });

			  $('input#offDutyTime').focus(function(){
			    if($('input#date').val() == "" || $('input#onDutyTime').val() == "" || 
			                               $('input#offDutyTime').val() == "")
			    {
			      $('#next').hide();
			    }else{
			      $('#next').show();
			    }
			  })
			  // alert(parseFloat($('#totalspan').text()));
			$('#next').click(function(){
			 var onDutyTime_arr = $('#onDutyTime').val().split(':')
			 var offDutyTime_arr = $('#offDutyTime').val().split(':');
			 var from = parseInt(onDutyTime_arr[0]) + parseInt(onDutyTime_arr[1])/60;
			 var to = parseInt(offDutyTime_arr[0]) + parseInt(offDutyTime_arr[1])/60;
			 var hours = to - from;
			 $('#hours').val(hours);
			 var totalhours = parseFloat($('#totalspan').text()) + hours;
			 // $('span#totalspan').text(totalhours);

			 window.location.href = window.location.href;
			 $('span#totalspan').text(totalhours);
			 // window.location.replace(window.location.href);
			});

			// $('.wpcf7-submit').on('click', function (e) {
			//     alert($('#hours').val())
			// });

		    mobiscroll.settings = {
		        lang: 'en',                          
		        theme: 'ios',                 
		            themeVariant: 'light',       
		        display: 'bubble'  
		    };
		    

		        $('#onDutyTime').mobiscroll().time({
		            timeFormat: 'HH:ii',
		            steps: {
		            minute: 15
		            }
		        });
		        $('#offDutyTime').mobiscroll().time({
		            timeFormat: 'HH:ii',
		            steps: {
		            minute: 15
		            }
		        });
		  });
		 
		</script>
	</body>
</html>
