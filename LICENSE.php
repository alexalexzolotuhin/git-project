<?php

use yii\helpers\Html;
use yii\helpers\Html;
use yii\helpers\Html;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TezisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Проблемы и решения ';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Modal "Записаться на занятия" -->
<div class="modal fade" id="my-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-body">
	111
       </div>
     </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="tezis-index container">
	<div class="row">
		<div class="col-md-2">
			<h2>Категории проблем</h2>
			<ul class="catalog category-products">
				<?= \app\components\MenuWidget::widget(['tpl' => 'menu', 'menu_type'=>'tezis', 'moderation'=>true])?>
			</ul>
			
		
			<?= Html::a('Предложить категорию', ['category/create'], ['class' => 'btn btn-success']) ?>
		</div>
		<div class="col-md-5 tezis_table">
			<h1><?= Html::encode($this->title) ?></h1>
			<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

			<p>
			<?= Html::a('Create Tezis', ['create'], ['class' => 'btn btn-success']) ?>
			</p>
			<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'tableOptions' => [
				'class' => 'table'
			],
			'columns' => [
				//['class' => 'yii\grid\SerialColumn'],

				'id',
				'text_mini',
			//	'text:ntext',
				
				[
                'attribute' => 'status',
                'value' => function($data){
                    return !$data->status ? '<span class="glyphicon glyphicon-random"></span><span class="text-info"> в процессе</span>' : '<span class="glyphicon glyphicon-chevron-down text-success"></span><span class="text-success">решено</span>';
                },
                'format' => 'html',
				],
				
			'columns' => [  
                'attribute' => 'add_column',
                'format' => 'raw',
                'value' => function ($data) {
                    return 	'<button type="button" data-id="'.$data->id.'" class="tezis_more btn btn-primary"><span class="glyphicon glyphicon-arrow-right"></span> Показать</button>';
                },
            ],

				//['class' => 'yii\grid\ActionColumn'],
				   ['class' => 'yii\grid\ActionColumn',
                          'template'=>'{delete}{update}',
                            'buttons'=>[
                              'update' => function ($url, $model) {  
									if (Yii::$app->user->can('articleUpdate', ['article' => $model])) {
										return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                        'title' => Yii::t('yii', 'Изменить'),
											]);
									}else{
										return '';
									}
                              },
                              'delete' => function ($url, $model) {  
									if (Yii::$app->user->can('articleUpdate', ['article' => $model])) {
										return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'title' => Yii::t('yii', 'Удалить'),
											]);
									}else{
										return '';
									}
                              },
                          ]                            
                     ],
			],
			]); ?>
		</div>	
		<div class="col-md-5">
			<div class="panel panel-primary">
				<div class="panel-heading">Решения</div>
				<div class="panel-body reshenie_block">
					
				</div>
			</div>
		</div>
	
		</div>
</div>
