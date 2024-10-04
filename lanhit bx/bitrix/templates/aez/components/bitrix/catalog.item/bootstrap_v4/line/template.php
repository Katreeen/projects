<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var string $discountPositionClass
 * @var string $labelPositionClass
 * @var CatalogSectionComponent $component
 */

if ($haveOffers)
{
	$showDisplayProps = !empty($item['DISPLAY_PROPERTIES']);
	$showProductProps = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $item['OFFERS_PROPS_DISPLAY'];
	$showPropsBlock = $showDisplayProps || $showProductProps;
	$showSkuBlock = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && !empty($item['OFFERS_PROP']);
}
else
{
	$showDisplayProps = !empty($item['DISPLAY_PROPERTIES']);
	$showProductProps = $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !empty($item['PRODUCT_PROPERTIES']);
	$showPropsBlock = $showDisplayProps || $showProductProps;
	$showSkuBlock = false;
}
?>

<div class="offer-card">
	<div class="offer-card__inner">
		
		<a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="offer-card__img" data-entity="image-wrapper">
			<img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="">
		</a>
		<div class="offer-card__content">
			
			<div class="offer-card__top">
				<div class="offer-card__wrap">
					<a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="offer-card__name title title--second"><?= $productTitle ?></a>
					<div class="offer-card__text"><?= $item['PROPERTIES']['SUBTITLE']['VALUE'] ?></div>
				</div>
		
				<?if ($haveOffers){
					$countOffers = count($item['OFFERS']);
					?>
				<div class="offer-card__more" data-count="<?=$countOffers?>">Show offers (<?=$countOffers?>)</div>
				<?}?>
			</div>
			<div class="row justify-content-between d-none">
				<div class="col-md-3">
					<? if ($itemHasDetailUrl): ?>
						<a class="product-item-image-wrapper" href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$imgTitle?>" data-entity="image-wrapper">
					<? else: ?>
						<span class="product-item-image-wrapper" data-entity="image-wrapper">
					<? endif; ?>
						<span class="product-item-image-slider-slide-container slide" id="<?=$itemIds['PICT_SLIDER']?>" <?=($showSlider ? '' : 'style="display: none;"')?> data-slider-interval="<?=$arParams['SLIDER_INTERVAL']?>" data-slider-wrap="true">
							<?
							if ($showSlider)
							{
								foreach ($morePhoto as $key => $photo)
								{
									?>
									<span class="product-item-image-slide item <?=($key == 0 ? 'active' : '')?>" style="background-image: url('<?=$photo['SRC']?>');"></span>
									<?
								}
							}
							?>
						</span>
						<span class="product-item-image-original" id="<?=$itemIds['PICT']?>" style="background-image: url('<?=$item['PREVIEW_PICTURE']['SRC']?>'); <?=($showSlider ? 'display: none;' : '')?>"></span>
						<?
						if ($item['SECOND_PICT'])
						{
							$bgImage = !empty($item['PREVIEW_PICTURE_SECOND']) ? $item['PREVIEW_PICTURE_SECOND']['SRC'] : $item['PREVIEW_PICTURE']['SRC'];
							?>
								<span class="product-item-image-alternative" id="<?=$itemIds['SECOND_PICT']?>" style="background-image: url('<?=$bgImage?>'); <?=($showSlider ? 'display: none;' : '')?>"></span>
							<?
						}

						if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y')
						{
							?>
								<div class="product-item-label-ring <?=$discountPositionClass?>" id="<?=$itemIds['DSC_PERC']?>" <?=($price['PERCENT'] > 0 ? '' : 'style="display: none;"')?>>
									<span><?=-$price['PERCENT']?>%</span>
								</div>
							<?
						}

						if ($item['LABEL'])
						{
							?>
								<div class="product-item-label-text <?=$labelPositionClass?>" id="<?=$itemIds['STICKER_ID']?>">
									<?
									if (!empty($item['LABEL_ARRAY_VALUE']))
									{
										foreach ($item['LABEL_ARRAY_VALUE'] as $code => $value)
										{
											?>
											<div <?=(!isset($item['LABEL_PROP_MOBILE'][$code]) ? ' class="d-none d-sm-block"' : '')?>>
												<span title="<?=$value?>"><?=$value?></span>
											</div>
											<?
										}
									}
									?>
								</div>
							<?
						}
						?>
						<div class="product-item-image-slider-control-container" id="<?=$itemIds['PICT_SLIDER']?>_indicator" <?=($showSlider ? '' : 'style="display: none;"')?>>
							<?
							if ($showSlider)
							{
								foreach ($morePhoto as $key => $photo)
								{
									?>
										<div class="product-item-image-slider-control<?=($key == 0 ? ' active' : '')?>" data-go-to="<?=$key?>"></div>
									<?
								}
							}
							?>
						</div>
						<?
						if ($arParams['SLIDER_PROGRESS'] === 'Y')
						{
							?>
							<span class="product-item-image-slider-progress-bar-container">
								<span class="product-item-image-slider-progress-bar" id="<?=$itemIds['PICT_SLIDER']?>_progress_bar" style="width: 0;"></span>
							</span>
							<?
						}
						?>
					<? if ($itemHasDetailUrl): ?>
						</a>
					<? else: ?>
						</span>
					<? endif; ?>
				</div>
			</div>
			<?
			if (!$haveOffers)
			{
				if ($showPropsBlock)
				{
					?>
	
						<?
						if ($showDisplayProps)
						{
							?>
							<div class="product-item-info-container" data-entity="props-block">
								<div class="offer-card__details product-item-properties">
									<?
									foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty)
									{
										?>
										
										<div class="offer-card__detail"><span><?=$displayProperty['NAME']?>:</span><span><?=(is_array($displayProperty['~VALUE'])
												? implode(' / ', $displayProperty['~VALUE'])
												: $displayProperty['~VALUE'])?></span></div>

										
										<?
									}
									?>
								</div>
							</div>
							<?
						}

						if ($showProductProps)
						{
							?>
							<div id="<?=$itemIds['BASKET_PROP_DIV']?>" style="display: none;">
								<?
								if (!empty($item['PRODUCT_PROPERTIES_FILL']))
								{
									foreach ($item['PRODUCT_PROPERTIES_FILL'] as $propID => $propInfo)
									{
										?>
										<input type="hidden" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]"
											value="<?=htmlspecialcharsbx($propInfo['ID'])?>">
										<?
										unset($item['PRODUCT_PROPERTIES'][$propID]);
									}
								}

								if (!empty($item['PRODUCT_PROPERTIES']))
								{
									?>
									<table>
										<?
										foreach ($item['PRODUCT_PROPERTIES'] as $propID => $propInfo)
										{
											?>
											<tr>
												<td><?=$item['PROPERTIES'][$propID]['NAME']?></td>
												<td>
													<?
													if (
														$item['PROPERTIES'][$propID]['PROPERTY_TYPE'] === 'L'
														&& $item['PROPERTIES'][$propID]['LIST_TYPE'] === 'C'
													)
													{
														foreach ($propInfo['VALUES'] as $valueID => $value)
														{
															?>
															<label>
																<? $checked = $valueID === $propInfo['SELECTED'] ? 'checked' : ''; ?>
																<input type="radio" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]"
																	value="<?=$valueID?>" <?=$checked?>>
																<?=$value?>
															</label>
															<br />
															<?
														}
													}
													else
													{
														?>
														<select name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]">
															<?
															foreach ($propInfo['VALUES'] as $valueID => $value)
															{
																$selected = $valueID === $propInfo['SELECTED'] ? 'selected' : '';
																?>
																<option value="<?=$valueID?>" <?=$selected?>>
																	<?=$value?>
																</option>
																<?
															}
															?>
														</select>
														<?
													}
													?>
												</td>
											</tr>
											<?
										}
										?>
									</table>
									<?
								}
								?>
							</div>
							<?
						}
						?>
				
					<?
				}?>
			</div>
		</div>
			<?
			}
			else
			{
				if ($showPropsBlock)
				{
					$gridPropsBlockClass = $showSkuBlock ? 'col-lg col-md-9' : 'col';

					?>
					<div class="product-item-info-container" data-entity="props-block">
						<div class="offer-card-row product-item-properties">
						<div class="offer-card__details">
							<?
							if ($showDisplayProps)
							{
								foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty)
								{
									?>
									
									<div class="offer-card__detail"><span><?=$displayProperty['NAME']?>:</span><span><?=(is_array($displayProperty['~VALUE'])
											? implode(' / ', $displayProperty['~VALUE'])
											: $displayProperty['~VALUE'])?></span></div>

									
									<?
								}
								?>
								<? if (($item["PROPERTIES"]["SPEC"]["VALUE"] != '') && ($USER->IsAuthorized())) {
									$specFile = CFile::GetFileArray($item["PROPERTIES"]["SPEC"]["VALUE"]);
									$specLink = $specFile["SRC"]; ?>


									<div class="offer-card__detail">
										<!-- <span>Спецификация:</span> -->
										<!-- <span class="card__txt">SDS</span> -->
										<a href="<?= $specLink ?>" alt="" download>
											<img src="<?=SITE_TEMPLATE_PATH?>/images/sds.svg" alt="">
										</a>
									</div>
								<? } 

								if (($item["PROPERTIES"]["PASPORT"]["VALUE"] != '') && ($USER->IsAuthorized())) {
									$pasportFile = CFile::GetFileArray($item["PROPERTIES"]["PASPORT"]["VALUE"]);
									$pasportLink = $pasportFile["SRC"];
								?>
									<div class="offer-card__detail">
										<!-- <span>Паспорт безопасности:</span> -->
										<!-- <span class="card__txt">COA</span> -->
										<a href="<?= $pasportLink ?>" alt="" download>
											<img src="<?=SITE_TEMPLATE_PATH?>/images/soa.svg" alt="">
										</a>
									</div>
								<? }
							}

							if ($showProductProps)
							{
								?>
								<span id="<?=$itemIds['DISPLAY_PROP_DIV']?>" style="display: none;"></span>
								<?
							}
							?>
						</div>

						</div>
					</div>
					<?
				} ?>
				</div>
			</div>

				<?

				if ($showSkuBlock)
				{

					$gridSkuBlockClass = $showPropsBlock ? 'col-7 col-sm-8 col-lg-3' : 'col';
					?>
					<div class="offer-card__table">
						<div class="table-detail" id="<?=$itemIds['PROP_DIV']?>">
							<div class="table-detail__head">
									<div class="table-detail__column table-detail__column--s">
											<div class="table-detail__text table-detail__text--bold">Article number:</div>
									</div>
									<div class="table-detail__column table-detail__column--m">
											<div class="table-detail__text table-detail__text--bold">Size: </div>
									</div>
									<div class="table-detail__column table-detail__column--l">
											<div class="table-detail__text table-detail__text--bold">Price offer:</div>
									</div>
							</div>
							<div class="table-detail__body">
							<?
							foreach ($arParams['SKU_PROPS'] as $skuProperty)
							{
								$propertyId = $skuProperty['ID'];
								$skuProperty['NAME'] = htmlspecialcharsbx($skuProperty['NAME']);
								if (!isset($item['SKU_TREE_VALUES'][$propertyId]))
									continue;
								?>
								<div class="product-item-info-container" data-entity="sku-block">
									<div class="product-item-scu-container" data-entity="sku-line-block">
										<div class="product-item-scu-block-title text-muted"><?//=$skuProperty['NAME']?></div>
										<div class="product-item-scu-block">
											<div class="product-item-scu-list">
												<ul class="product-item-scu-item-list">

													<?
													foreach ($skuProperty['VALUES'] as $value)
													{
														if (!isset($item['SKU_TREE_VALUES'][$propertyId][$value['ID']]))
															continue;

														$value['NAME'] = htmlspecialcharsbx($value['NAME']);

														if ($skuProperty['SHOW_MODE'] === 'PICT')
														{
															?>
															<li class="product-item-scu-item-color-container" title="<?=$value['NAME']?>" data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
																<div class="product-item-scu-item-color-block">
																	<div class="product-item-scu-item-color" title="<?=$value['NAME']?>" style="background-image: url('<?=$value['PICT']['SRC']?>');"></div>
																</div>
															</li>
															<?
														}
														else
														{
															?>
															<li class="table-detail__line product-item-scu-item-text-container" title="<?=$value['NAME']?>"
																data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
																<div class="table-detail__column table-detail__column--s">
																		<div class="table-detail__text"><?= $item['PROPERTIES']['PRODUCT_ID']['~VALUE']?></div>
																</div>
																<div class="product-item-scu-item-text-block table-detail__column table-detail__column--m">
																		<div class="table-detail__text product-item-scu-item-text"><?=$value['NAME']?> g</div>
																</div>
																<div class="table-detail__column table-detail__column--l">
																	<a class="table-detail__add js-link-add" href="#"> 
																		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
																			<path d="M1.54325 7.49206C1.51875 7.39381 1.51695 7.29126 1.53799 7.19221C1.55903 7.09315 1.60236 7.00019 1.66469 6.92038C1.72702 6.84057 1.80671 6.77601 1.89772 6.7316C1.98873 6.68719 2.08866 6.66409 2.18992 6.66406H13.8166C13.9179 6.66409 14.0178 6.68719 14.1088 6.7316C14.1998 6.77601 14.2795 6.84057 14.3418 6.92038C14.4041 7.00019 14.4475 7.09315 14.4685 7.19221C14.4896 7.29126 14.4878 7.39381 14.4633 7.49206L13.2559 12.3207C13.1838 12.6092 13.0174 12.8653 12.783 13.0483C12.5487 13.2313 12.2599 13.3307 11.9626 13.3307H4.04392C3.74659 13.3307 3.45781 13.2313 3.22347 13.0483C2.98914 12.8653 2.82269 12.6092 2.75059 12.3207L1.54325 7.49273V7.49206Z" stroke="#7B5DE4" stroke-width="1.33333" stroke-linejoin="round"/>
																			<path d="M6 9.33073V10.6641M10 9.33073V10.6641M4 6.66406L6.66667 2.66406M12 6.66406L9.33333 2.66406" stroke="#7B5DE4" stroke-width="1.33333" stroke-linecap="round"/>
																		</svg> Add to Request</a>
																</div>

																
															</li>
															<?
														}
													}
													?>
												</ul>
												<div style="clear: both;"></div>
											</div>
										</div>
									</div>
								</div>
								<?
							}
							?>
							</div>
						</div>
					</div>
						<?
						foreach ($arParams['SKU_PROPS'] as $skuProperty)
						{
							if (!isset($item['OFFERS_PROP'][$skuProperty['CODE']]))
								continue;

							$skuProps[] = array(
								'ID' => $skuProperty['ID'],
								'SHOW_MODE' => $skuProperty['SHOW_MODE'],
								'VALUES' => $skuProperty['VALUES'],
								'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
							);
						}

						unset($skuProperty, $value);

						if ($item['OFFERS_PROPS_DISPLAY'])
						{
							foreach ($item['JS_OFFERS'] as $keyOffer => $jsOffer)
							{
								$strProps = '';

								if (!empty($jsOffer['DISPLAY_PROPERTIES']))
								{
									foreach ($jsOffer['DISPLAY_PROPERTIES'] as $displayProperty)
									{
										$strProps .= '<div class="hide"><dt>'.$displayProperty['NAME'].'</dt><dd>'
											.(is_array($displayProperty['VALUE'])
												? implode(' / ', $displayProperty['VALUE'])
												: $displayProperty['VALUE'])
											.'</dd></div>';
									}
								}
								$item['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
							}
							unset($jsOffer, $strProps);
						}
						?>
					
					<?
				}


		}
		?>

		<?

				$gridLastBlockClass = ($showPropsBlock && $showSkuBlock) ? 'col-5 col-sm-4 col-lg-auto text-center' : 'col-auto';
		?>
		<div class="product-item-pay-block">
			<?
			foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName)
			{
				switch ($blockName)
				{
					case 'price': ?>
						<div class="product-item-info-container product-item-price-container" data-entity="price-block">
							<span class="product-item-price-current" id="<?=$itemIds['PRICE']?>">
								<?
								if (!empty($price))
								{
									if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers)
									{
										echo Loc::getMessage(
											'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
											array(
												'#PRICE#' => $price['PRINT_RATIO_PRICE'],
												'#VALUE#' => $measureRatio,
												'#UNIT#' => $minOffer['ITEM_MEASURE']['TITLE']
											)
										);
									}
									else
									{
										echo $price['PRINT_RATIO_PRICE'];
									}
								}
								?>
							</span>
							<?
							if ($arParams['SHOW_OLD_PRICE'] === 'Y')
							{
								?>
								<br><span class="product-item-price-old" id="<?=$itemIds['PRICE_OLD']?>" <?=($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '')?>>
									<?=$price['PRINT_RATIO_BASE_PRICE']?>
								</span>&nbsp;
								<?
							}
							?>
						</div>
						<?
						break;

					case 'quantityLimit':
						if ($arParams['SHOW_MAX_QUANTITY'] !== 'N')
						{
							if ($haveOffers)
							{
								if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
								{
									?>
									<div class="product-item-info-container product-item-hidden"
										id="<?=$itemIds['QUANTITY_LIMIT']?>"
										style="display: none;"
										data-entity="quantity-limit-block">
										<div class="product-item-info-container-title text-muted">
											<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
											<span class="product-item-quantity text-dark" data-entity="quantity-limit-value"></span>
										</div>
									</div>
									<?
								}
							}
							else
							{
								if (
									$measureRatio
									&& (float)$actualItem['CATALOG_QUANTITY'] > 0
									&& $actualItem['CATALOG_QUANTITY_TRACE'] === 'Y'
									&& $actualItem['CATALOG_CAN_BUY_ZERO'] === 'N'
								)
								{
									?>
									<div class="product-item-info-container product-item-hidden" id="<?=$itemIds['QUANTITY_LIMIT']?>">
										<div class="product-item-info-container-title text-muted">
											<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
											<span class="product-item-quantity text-dark" data-entity="quantity-limit-value">
												<?
												if ($arParams['SHOW_MAX_QUANTITY'] === 'M')
												{
													if ((float)$actualItem['CATALOG_QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR'])
													{
														echo $arParams['MESS_RELATIVE_QUANTITY_MANY'];
													}
													else
													{
														echo $arParams['MESS_RELATIVE_QUANTITY_FEW'];
													}
												}
												else
												{
													echo $actualItem['CATALOG_QUANTITY'].' '.$actualItem['ITEM_MEASURE']['TITLE'];
												}
												?>
											</span>
										</div>
									</div>
									<?
								}
							}
						}

						break;

					case 'quantity':
						if (!$haveOffers)
						{
							if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY'])
							{
								?>
								<div class="table-detail__number product-item-info-container" data-entity="quantity-block">
									<div class="product-item-amount">
										<div class="input-number product-item-amount-field-container">

										<button class="product-item-amount-field-btn-minus no-select input-number__minus" type="button" id="<?=$itemIds['QUANTITY_DOWN']?>">
                    </button>
											
											<div class="product-item-amount-field-block">
												<input class="input-number__input product-item-amount-field" id="<?=$itemIds['QUANTITY']?>" type="number" name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>" value="<?=$measureRatio?>">
												<div class="product-item-amount-description-container">
													<span id="<?=$itemIds['QUANTITY_MEASURE']?>"><?=$actualItem['ITEM_MEASURE']['TITLE']?></span>
													<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
												</div>
											</div>
											<button class="product-item-amount-field-btn-plus no-select input-number__plus" type="button" id="<?=$itemIds['QUANTITY_UP']?>">
											</button>
										</div>
									</div>
								</div>
								<?
							}
						}
						elseif ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
						{
							if ($arParams['USE_PRODUCT_QUANTITY'])
							{
								?>
								<div class="table-detail__number product-item-info-container" data-entity="quantity-block">
									<div class="product-item-amount">
										<div class="input-number product-item-amount-field-container">

											<button class="input-number__minus product-item-amount-field-btn-minus no-select" type="button" id="<?=$itemIds['QUANTITY_DOWN']?>">
											</button>

					
											<div class="product-item-amount-field-block">
												<input class="input-number__input product-item-amount-field" id="<?=$itemIds['QUANTITY']?>" type="number" name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>" value="<?=$measureRatio?>">
												<div class="product-item-amount-description-container">
													<span id="<?=$itemIds['QUANTITY_MEASURE']?>"></span>
													<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
												</div>
											</div>
											<button class="input-number__plus product-item-amount-field-btn-plus no-select" type="button" id="<?=$itemIds['QUANTITY_UP']?>">
											</button>

								
										</div>
									</div>
								</div>
								<?
							}
						}

						break;

					case 'buttons':
						?>
						<div class="product-item-info-container" data-entity="buttons-block">
							<?
							if (!$haveOffers)
							{
								if ($actualItem['CAN_BUY'])
								{
									?>
									<div class="product-item-button-container" id="<?=$itemIds['BASKET_ACTIONS']?>">
										<button class="table-detail__add js-link-add"
											id="<?=$itemIds['BUY_LINK']?>"
											href="javascript:void(0)"
											rel="nofollow">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
												<path d="M1.54325 7.49206C1.51875 7.39381 1.51695 7.29126 1.53799 7.19221C1.55903 7.09315 1.60236 7.00019 1.66469 6.92038C1.72702 6.84057 1.80671 6.77601 1.89772 6.7316C1.98873 6.68719 2.08866 6.66409 2.18992 6.66406H13.8166C13.9179 6.66409 14.0178 6.68719 14.1088 6.7316C14.1998 6.77601 14.2795 6.84057 14.3418 6.92038C14.4041 7.00019 14.4475 7.09315 14.4685 7.19221C14.4896 7.29126 14.4878 7.39381 14.4633 7.49206L13.2559 12.3207C13.1838 12.6092 13.0174 12.8653 12.783 13.0483C12.5487 13.2313 12.2599 13.3307 11.9626 13.3307H4.04392C3.74659 13.3307 3.45781 13.2313 3.22347 13.0483C2.98914 12.8653 2.82269 12.6092 2.75059 12.3207L1.54325 7.49273V7.49206Z" stroke="#7B5DE4" stroke-width="1.33333" stroke-linejoin="round"></path>
												<path d="M6 9.33073V10.6641M10 9.33073V10.6641M4 6.66406L6.66667 2.66406M12 6.66406L9.33333 2.66406" stroke="#7B5DE4" stroke-width="1.33333" stroke-linecap="round"></path>
											</svg>

											<?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
										</button>
									</div>
									<?
								}
								else
								{
									?>
									<div class="product-item-button-container">
										<?
										if ($showSubscribe)
										{
											$APPLICATION->IncludeComponent(
												'bitrix:catalog.product.subscribe',
												'',
												array(
													'PRODUCT_ID' => $actualItem['ID'],
													'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
													'BUTTON_CLASS' => 'btn btn-primary '.$buttonSizeClass,
													'DEFAULT_DISPLAY' => true,
													'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
												),
												$component,
												array('HIDE_ICONS' => 'Y')
											);
										}
										?>
										<br>
										<button class="table-detail__add"
											id="<?=$itemIds['NOT_AVAILABLE_MESS']?>"
											href="javascript:void(0)"
											rel="nofollow">
											<?=$arParams['MESS_NOT_AVAILABLE']?>
										</button>
									</div>
									<?
								}
							}
							else
							{
								if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
								{
									?>
									<div class="product-item-button-container">
										<?
										if ($showSubscribe)
										{
											$APPLICATION->IncludeComponent(
												'bitrix:catalog.product.subscribe',
												'',
												array(
													'PRODUCT_ID' => $item['ID'],
													'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
													'BUTTON_CLASS' => 'btn btn-primary '.$buttonSizeClass,
													'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
													'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
												),
												$component,
												array('HIDE_ICONS' => 'Y')
											);
										}
										?>
										<button class="btn btn-link <?=$buttonSizeClass?>"
											id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="javascript:void(0)" rel="nofollow"
											<?=($actualItem['CAN_BUY'] ? 'style="display: none;"' : '')?>>
											<?=$arParams['MESS_NOT_AVAILABLE']?>
										</button>
										<div id="<?=$itemIds['BASKET_ACTIONS']?>" <?=($actualItem['CAN_BUY'] ? '' : 'style="display: none;"')?>>
											<a class="table-detail__add" id="<?=$itemIds['BUY_LINK']?>"
												href="javascript:void(0)" rel="nofollow">
												<?=$arParams['MESS_BTN_ADD_TO_BASKET']?>
												<?/*=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])*/?>
											</a>
										</div>
									</div>
									<?
								}
								else
								{
									?>
									<div class="product-item-button-container">
										<a class="table-detail__add" href="<?=$item['DETAIL_PAGE_URL']?>">
											<?=$arParams['MESS_BTN_DETAIL']?>
										</a>
									</div>
									<?
								}
							}
							?>
						</div>
						<?
						break;

					case 'compare':
						if (
							$arParams['DISPLAY_COMPARE']
							&& (!$haveOffers || $arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
						)
						{
							?>
							<div class="product-item-compare-container">
								<div class="product-item-compare">
									<div class="checkbox">
										<label id="<?=$itemIds['COMPARE_LINK']?>">
											<input type="checkbox" data-entity="compare-checkbox">
											<span data-entity="compare-title"><?=$arParams['MESS_BTN_COMPARE']?></span>
										</label>
									</div>
								</div>
							</div>
							<?
						}

						break;
				}
			}
			?>
		</div>


</div>