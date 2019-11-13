<?php get_header(); ?>

		<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<div class="contents-page">
				<!-- CONTENTS SECTION -->
				<section class="contents-section contents-page__center">

					<?php custom_breadcrumb(); ?>

					<div class="contents-section__inner">

						<div class="contents-title">
							<h2><?php the_title(); ?></h2>
						</div>

						<div class="contents-main-area flex-row-page">
                        <div class="flex-row-page__left">
                            <div class="google-map">
                                <iframe title="ワルツ珈琲店のグーグルマップ" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.625425226139!2d135.62125421487426!3d34.61363219538482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60012715cc3e38cf%3A0xc0970e5b9dce2910!2zV2F2ZWVlIOWFq-WwvuW4guOCpOOCv-ODquOCouODsw!5e0!3m2!1sen!2sie!4v1571242684586!5m2!1sen!2sie" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                        </div><!-- .flex-row-page__left -->

                        <div class="flex-row-page__right">
                            <div class="contents-main-area__text">
                                <p>ワルツ珈琲店</p>
                                <p>〒581-0022　八尾市柏村町4-6-4</p>    
                                <p>金光八尾高校より徒歩1分／八尾おゆばより徒歩1分</p>
                                <h5>営業時間</h5>
                                <p>月曜・火曜 休業</p>                                   
                                <p>水曜〜日曜　9時〜16時</p>
                                <p>注）GoogleマップではWaveeeという店名で表示されてしまいますが、そちらが正しい住所です。</p>
                            </div>
						</div><!-- .flex-row-page__right -->
						
					</div>
					
				</section>
				
			</div>

		<!-- BOTTOM-BANNER SECTION -->
		<?php get_template_part( 'template-parts/content', 'banner' ); ?>
		</main>

<?php get_footer(); ?>
