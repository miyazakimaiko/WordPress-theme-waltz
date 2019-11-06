<?php get_header(); ?>

		<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<div class="contents-page">
				<!-- CONTENTS SECTION -->
				<section class="contents-section contents-page__center">
					<?php custom_breadcrumb(); ?>
					<div class="contents-section__inner">
						<div class="contents-title">
							<h2><span><?php the_title(); ?></span></h2>
						</div>

						<div class="contents-main-area">
							<div class="contents-main-area__text">
								<p>・お飲み物は２杯目から¥100引きです。</p>
								<p>・コーヒーは<span class="border-red">全てこだわりの自家焙煎</span>。ご注文後、丁寧にハンドドリップいたします。</p>
							</div>
						</div>

						<div class="contents-main-area flex-row-page">
							<div class="flex-row-page__left">
								<h3 class="menu-h3">自家焙煎珈琲</h3>

								<div class="flex-row-page">
									<h4>ブレンド３種</h4>
									<h4>各 ¥500</h4>
								</div>
								<div class="description">
									<p>・ワルツブレンド(中煎り)</p>
									<p>・トロピカルブレンド(浅煎り)</p>
									<p>・フレンチブレンド(深煎り)</p>
								</div>

								<div class="flex-row-page">
									<h4>特製水出しアイスコーヒー</h4>
									<h4>¥500</h4>
								</div>

								<div class="flex-row-page">
									<h4>カフェ・オ・レ</h4>
									<h4>¥500</h4>
								</div>
								<div class="description">
									<p>・Hot/Ice</p>
								</div>

								<div class="flex-row-page">
									<h4><span class="border-red">世界のスペシャリティ・</span><br><span class="border-red">ストレートコーヒー</span></h4>
									<h4>¥600 〜</h4>
								</div>
								<div class="description">
									<p>・ブルーマウンテン、ハワイコナなどあります。</p>
									<p>・一覧は
										<a href="<?php echo get_permalink( get_page_by_path('coffee-beans') ); ?>">こちら</a>から
									</p>
									<p>・スーパーリッチデミタス  + ¥300</p>
									<p>・トルココーヒーデミタス(煮出しコーヒー) + ¥100</p>
								</div>
								<div class="image">
									<img src="assets/img/DSC_0324.JPG" alt="">
								</div>
							</div><!-- .flex-row-page__left -->

							<div class="flex-row-page__right">
								<h3 class="menu-h3">ハーブティー</h3>

								<div class="flex-row-page">
									<h4>１２種類のオリジナルブレンドハーブティー</h4>
									<h4>各 ¥600</h4>
								</div>
								<div class="description">
									<p>・Hot/Ice</p>
									<p>・一覧は
										<a href="<?php echo get_permalink( get_page_by_path('harbal-tea') ); ?>">こちら</a>から
									</p>
								</div>

								<h3 class="menu-h3">手作りケーキ</h3>

								<div class="flex-row-page">
									<h4>レアチーズケーキ</h4>
									<h4>¥380</h4>
								</div>

								<div class="flex-row-page">
									<h4>ニューヨーク チーズケーキ</h4>
									<h4>¥380</h4>
								</div>

								<div class="flex-row-page">
									<h4>アマンディーヌ（タルト）</h4>
									<h4>¥380</h4>
								</div>

								<div class="flex-row-page">
									<h4><span class="border-red">ケーキセット</span></h4>
									<h4>¥800〜</h4>
								</div>
								<div class="description">
									<p class="border-regular">・お好きなお飲み物＋ケーキのご注文で、ケーキが¥300になります。</p>
								</div>

								<h3 class="menu-h3">紅茶</h3>

								<div class="flex-row-page">
									<h4>ダージリン、アールグレイ、アッサム</h4>
									<h4>各 ¥600</h4>
								</div>
								<div class="description">
									<p>・Hot/Ice</p>
									<p>・レモン／ミルク／ストレート</p>
								</div>
							</div><!-- .flex-row-page__right -->
						</div>

						<div class="contents-main-area">
							<h3 class="menu-h3">その他のお飲みもの</h3>
							<div class="flex-row-page">
								<div class="flex-row-page__left">
									<div class="flex-row-page">
										<p>ココア（Hot/Ice）</p>
										<p>¥600</p>
									</div>
									<div class="flex-row-page">
										<p>生姜ココア（Hot/Ice）</p>
										<p>¥650</p>
									</div>
									<div class="flex-row-page">
										<p>チャイ（Hot/Ice）</p>
										<p>¥600</p>
									</div>
									<div class="flex-row-page">
										<p>シナモンチャイ（Hot/Ice）</p>
										<p>¥650</p>
									</div>
									<div class="flex-row-page">
										<p>マサラチャイ（Hot/Ice）</p>
										<p>¥650</p>
									</div>
								</div>
								<div class="flex-row-page__right">
									<div class="flex-row-page">
										<p>ミルク（Hot/Ice）</p>
										<p>¥500</p>
									</div>
									<div class="flex-row-page">
										<p>特製ハーブカルピス（Hot/Ice）</p>
										<p>650</p>
									</div>
									<div class="description">
										<p class="border-regular">・+ ¥50 でカルピスソーダにできます</p>
									</div>
									<div class="flex-row-page">
										<p>りんごジュース</p>
										<p>¥600</p>
									</div>
									<div class="flex-row-page">
										<p>オレンジジュース</p>
										<p>¥500</p>
									</div>
								</div>
							</div>
						</div>

					</div>
				</section>
			</div>

		<!-- BOTTOM-BANNER SECTION -->
		<?php get_template_part( 'template-parts/content', 'banner' ); ?>
		</main>

<?php get_footer(); ?>
