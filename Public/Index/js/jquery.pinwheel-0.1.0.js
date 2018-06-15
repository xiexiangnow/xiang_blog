/*!
 * jQuery Pinwheel - A Tooltips Plugin
 * ------------------------------------------------------------------
 *
 * jQuery Pinwheel is a plugin that show tooltips.
 *
 * @version        0.1.0
 * @since          2013.08.14
 * @author         charles.yu
 * @documentation  
 *
 * ------------------------------------------------------------------
 *
 *  <div id="tip"></div>
 *
 *  $('#tip').pinwheel();
 *
 */
(function($){
	var $loading, $wrap, timers = [], optsArray = [], currentObj, currentOpts = {},
		
		_position = function($ref, $target){
			var scrollTop,
				scrollLeft,
				windowHeight,
				windowWidth,
				refOffset,
				refHeight,
				refWidth,
				targetTop,
				targetLeft,
				targetHeight,
				targetWidth,
				originTop,
				originRight,
				originBottom,
				originLeft,
				arrowPositon,//��ͷ����
				arrowSize = 5,
				isPosition = false;
				
			
			scrollTop = $(document).scrollTop();
			scrollLeft = $(document).scrollLeft();
			windowHeight = $(window).height();
			windowWidth = $(window).width();
			refOffset = $ref.offset();
			refHeight = $ref.outerHeight();
			refWidth = $ref.outerWidth();
			targetHeight = $target.outerHeight();
			targetWidth = $target.outerWidth();
			
			
			//��λ��ʾ��λ��
			if(refOffset.top - scrollTop - targetHeight - arrowSize>= 0){//��
				if(windowWidth + scrollLeft - refOffset.left - targetWidth >= 0){//����
					targetTop = refOffset.top - targetHeight - arrowSize;
					targetLeft = refOffset.left;
					isPosition = true;
					arrowPositon = "b";
				}else if(refOffset.left + refWidth -scrollLeft - targetWidth >=0){//����
					targetTop = refOffset.top - targetHeight - arrowSize;
					targetLeft = refOffset.left + refWidth - targetWidth;
					isPosition = true;
					arrowPositon = "b";
					$wrap.find('.arrow').css({left: 'auto',right: '20px'});
				}
			}
			
			if(!isPosition){
				if(windowHeight - (refOffset.top + refHeight - scrollTop) - targetHeight - arrowSize >= 0){//��
					if(windowWidth + scrollLeft  - refOffset.left - targetWidth >= 0){//����
						targetTop = refOffset.top + refHeight + arrowSize;
						targetLeft = refOffset.left;
						isPosition = true;
						arrowPositon = "t";
					}else if(refOffset.left + refWidth -scrollLeft - targetWidth >=0){//����
						targetTop = refOffset.top + refHeight + arrowSize;
						targetLeft = refOffset.left + refWidth - targetWidth;
						isPosition = true;
						arrowPositon = "t";
						$wrap.find('.arrow').css({left: 'auto',right: '20px'});
					}
				}
			}
			
			
			if(!isPosition){
				if(windowWidth + scrollLeft - refOffset.left - refWidth - targetWidth - arrowSize>= 0){//��
					if(refOffset.top + refHeight - scrollTop - targetHeight >= 0){//����
						targetTop = refOffset.top + refHeight - targetHeight;
						targetLeft = refOffset.left + refWidth + arrowSize;
						isPosition = true;
						arrowPositon = "l";
						$wrap.find('.arrow').css({top: 'auto', bottom: '20px'});
					}else if(refOffset.top + windowHeight - scrollTop - targetHeight>= 0){//����
						targetTop = refOffset.top;
						targetLeft = refOffset.left + refWidth + arrowSize;
						isPosition = true;
						arrowPositon = "l";
					}
				}
			}
			
			if(!isPosition){
				if(refOffset.left - scrollLeft - targetWidth - arrowSize>=0){//��
					if(windowHeight - (refOffset.top - scrollTop) - targetHeight >= 0){//����
						targetTop = refOffset.top;
						targetLeft = refOffset.left - targetWidth -arrowSize;
						isPosition = true;
						arrowPositon = "r";
					}else if(refOffset.top + refHeight - scrollTop - targetHeight >= 0){//����
						targetTop = refOffset.top + refHeight - targetHeight;
						targetLeft = refOffset.left - targetWidth - arrowSize;
						isPosition = true;
						arrowPositon = "r";
						$wrap.find('.arrow').css({top: 'auto', bottom: '20px'});
					} 
				}
			}
			
			if(!isPosition){
				//���������λ(����������)
				//����ԭ����������Ӵ���Ե�ľ���
				originTop = refOffset.top - scrollTop + refHeight/2;
				originBottom = windowHeight - originTop;
				originLeft = refOffset.left - scrollLeft + refWidth/2;
				originRight = windowWidth - originLeft;
				
				if(originTop >= originBottom ){
					if(originRight >= originLeft){
						if(originTop < targetHeight && originRight >= targetWidth){//����
							targetTop = refOffset.top + refHeight - targetHeight;
							targetLeft = refOffset.left + refWidth + arrowSize;	
							arrowPositon = "l";
							$wrap.find('.arrow').css({top: 'auto', bottom: '20px'});
						}else{//����
							targetTop = refOffset.top - targetHeight - arrowSize;
							targetLeft = refOffset.left;
							arrowPositon = "b";
						}
					}else{
						if(originTop < targetHeight && originLeft >= targetWidth){//����
							targetTop = refOffset.top + refHeight - targetHeight;
							targetLeft = refOffset.left - targetWidth - arrowSize;
							arrowPositon = "r";
							$wrap.find('.arrow').css({top: 'auto', bottom: '20px'});
						}else{//����
							targetTop = refOffset.top - targetHeight - arrowSize;
							targetLeft = refOffset.left + refWidth - targetWidth;
							arrowPositon = "b";
							$wrap.find('.arrow').css({left: 'auto',right: '20px'});
						}
					}
				}else{
					if(originRight >= originLeft){
						if(originBottom < targetHeight && originRight >= targetWidth){//����
							targetTop = refOffset.top;
							targetLeft = refOffset.left + refWidth + arrowSize;		
							arrowPositon = "l";
						}else{//����
							targetTop = refOffset.top + refHeight + arrowSize;
							targetLeft = refOffset.left;
							arrowPositon = "t";
						}
					}else{
						if(originBottom < targetHeight && originLeft >= targetWidth){//����
							targetTop = refOffset.top;
							targetLeft = refOffset.left - targetWidth - arrowSize;
							arrowPositon = "r";
						}else{//����
							targetTop = refOffset.top + refHeight + arrowSize;
							targetLeft = refOffset.left + refWidth - targetWidth;
							arrowPositon = "t";
							$wrap.find('.arrow').css({left: 'auto',right: '20px'});
						}
					}
				}
				
				isPosition = true;	
			}
			
			$wrap.find('.arrow').removeClass().addClass('arrow arrow_' + arrowPositon);
			
			if(isPosition){
				$target.css({
					top: targetTop,
					left: targetLeft
				});
			}

		},
		
		_appendContent = function(){
			var type, href, data, content;
				
			$loading = $('<div class="pinwheel_loading"><div>���ڼ��أ����Ժ�</div></div>');
			if (typeof($wrap) != "undefined"){
				$wrap.html('');
			}else{	
				$('body').append('<div class="pinwheel_wrap"></div>');
				$wrap = $('.pinwheel_wrap');
			}
			$wrap.html('<div class="pinwheel_layer"><div class="bg"><div class="effect"><div class="pinwheel_content"></div><div class="arrow"></div></div></div></div>');
			$wrap.find('.pinwheel_content').append($loading);
			

			
			for(var i=0; i<optsArray.length; i++){
				if(optsArray[i] && optsArray[i].obj == currentObj){
					currentOpts = optsArray[i].opts;
					break;
				}
			}
			
			if(currentOpts.content){
				type = 'html';
			}else{
				type = 'ajax';
			}
			
			switch (type) {
				case 'html' :
					$wrap.find('.pinwheel_content').html(currentOpts.content);
				break;
				
				case 'ajax' :
					href = $(currentObj).attr('ajax-href');
					data = $(currentObj).attr('ajax-data');
					
					var ajaxLoader = $.ajax({
						url	: href,
						data : data || {},
						error : function(XMLHttpRequest, textStatus, errorThrown) {
							if ( XMLHttpRequest.status > 0 ) {
								window.console.log('ajax error');
							}
						},
						success : function(data, textStatus, XMLHttpRequest) {
							var o = typeof XMLHttpRequest == 'object' ? XMLHttpRequest : ajaxLoader;
							if (o.status == 200) {
								$wrap.find('.pinwheel_content').html(data);
								// ���¶�λ,Fix By �Ĥκ���
								_position($(currentObj), $wrap);//��λ
							}
						}
					});
				break;
			}
			//$wrap.find('.pinwheel_content').html(opts.content);	
		},
		
		_
		
		//������ж�ʱ�� ps:֮ǰû���ǵ�����������ʱ��,��㱻����...
		_clearTimer = function(){
			for(var i=0; i<timers.length; i++){
				if(timers[i]){
					clearInterval(timers[i]);
				}
			}
			timers = [];
		},
		
		_debug = function($obj){
			if(window.console && window.console.log){
				window.console.log("pinwheel count :" +��$obj.size());
			};
		};
		
	$.fn.pinwheel = function(options){
		//_debug(this);
		var opts = $.extend({}, $.fn.pinwheel.defaults, options);
		
		return this.each(function(){	
								  
			optsArray.push({obj:this, opts:opts});
			
			$(this).bind("mouseover",function(e){
				e.stopPropagation();
				_clearTimer();	
				
				
				if(currentObj && currentObj == this){			
					_position($(this), $wrap);//��λ
					$wrap.show();
				}else{
					currentObj = this;	
					_appendContent();//Ϊ�����������		
					_position($(this), $wrap);//��λ
					$wrap.show();

					$wrap.unbind().bind('mouseover', function(e){							  
						e.stopPropagation();
						_clearTimer();
					});
			
					$(document).unbind().bind("mouseover", function(){
						_clearTimer();																	
						if($wrap.is(':visible')){
							var timer = setInterval(function(){
								$wrap.hide();
								_clearTimer();
							},50);	
							timers.push(timer);
						}
					});		
				}
			});	
			
		});
	};
	
	$.fn.pinwheel.defaults = {

	};
})(jQuery);