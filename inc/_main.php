<?php
/**
 * CnTR - QR Kod Olusturucu
 *
 * @package CnTR
 * @category QRKod
 * @name CnTR
 * @version 1.0
 * @author CnTR
 * @link http://www.canibrahim.com.tr
 * Ücretsiz dağıtımdır lütfen para vererek almayınız.
 */
?>
<?php
if(count($_POST)){
	include "BarcodeQR.php";
	$qr = new BarcodeQR();

	
	if(isset($_POST['title']) && isset($_POST['url'])){ 
		$qr->bookmark($_POST['title'], $_POST['url']); 
	}elseif(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['email'])){
		$qr->contact($_POST['name'], $_POST['address'], $_POST['phone'], $_POST['email']); 
	}elseif(isset($_POST['type']) && isset($_POST['size']) && isset($_POST['content'])){ 
		$qr->content($_POST['type'], $_POST['size'], $_POST['content']);
	}elseif(isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){ 
		$qr->email($_POST['email'], $_POST['subject'], $_POST['message']); 
	}elseif(isset($_POST['lat']) && isset($_POST['lon']) && isset($_POST['height'])){ 
		$qr->geo($_POST['lat'],$_POST['lon'],$_POST['height']); 
	}elseif(isset($_POST['only_phone'])){ 
		$qr->phone($_POST['only_phone']); 
	}elseif(isset($_POST['phone']) && isset($_POST['text'])){ 
		$qr->sms($_POST['phone'], $_POST['text']); 
	}elseif(isset($_POST['only_text'])){ 
		$qr->text($_POST['only_text']); 
	}elseif(isset($_POST['only_url'])){ 
		$qr->url($_POST['only_url']); 
	}elseif(isset($_POST['wifi_type']) && isset($_POST['ssid']) && isset($_POST['password'])){ 
		$qr->wifi($_POST['wifi_type'], $_POST['ssid'], $_POST['password']);
	}

}
$size = array('1'=>'58','2'=>'87','3'=>'116','4'=>'174','5'=>'232','6'=>'290');
?>
<div class="container" style="margin-top:40px">	
	<div class="row">
        <div class="span12">
            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#bookmark"><i class="icon-bookmark"></i> Ozet Alan</a></li>
              <li><a href="#contact"><i class="icon-credit-card"></i> Kişisel Bilgiler</a></li>
              <li><a href="#content"><i class="icon-list"></i> Yazılı Alan</a></li>
            </ul> 
        </div>
    </div>
	<div class="row-fluid">
        <div class="span8">
                <div class="tab-content">
                  <div class="tab-pane active" id="bookmark">
                    <form action="" method="post" class="form-horizontal">
	                   <input type="hidden" name="id" value="bookmark">
	                  <div class="control-group">
                    <label class="control-label" for="title">Ünvan</label>
		                <div class="controls">
        		          	<input type="text" name="title" value="<?php if(isset($_POST['title'])) echo $_POST['title'];?>">
                        </div>
                    </div>  
                    <div class="control-group">
                    <label class="control-label" for="url">URL</label>
		                <div class="controls">      
                    	<input type="text" name="url" value="<?php if(isset($_POST['url'])) echo $_POST['url'];?>">
                     </div>
                    </div> 
                    <div class="control-group">
                    <label class="control-label" for="img_size">Boyut  (px)</label>
		                <div class="controls">  
                       	<select name="img_size">
                        	<?php foreach($size as $k=>$v){?>
                            	<option value="<?php echo $v?>" <?php if(isset($_POST['img_size']) && $_POST['img_size'] == $v){ echo "selected";}
								elseif(!isset($_POST['img_size']) && $k == 4){ echo "selected";}
								?>><?php echo $v?></option>
                            <?php }?>
                        </select>
                     </div>
                    </div>
                <div class="form-actions">
	         	<button type="submit" class="btn btn-primary"><i class="icon-qrcode"></i> Oluştur</button>
        		</div>
   			 </form>
                  </div>
                  <div class="tab-pane" id="contact">
                      <form action="" method="post" class="form-horizontal">
                       <input type="hidden" name="id" value="contact">
                  	<div class="control-group">
                    	<label class="control-label" for="name">İsim</label>
		                <div class="controls">
        		          	<input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label" for="address">Adres</label>
		                <div class="controls">
                            <textarea name="address"><?php if(isset($_POST['address'])) echo $_POST['address'];?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label" for="phone">Telefon</label>
		                <div class="controls">
        		          	<input type="text" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label" for="email">Email</label>
		                <div class="controls">
        		          	<input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label" for="img_size">Boyut  (px)</label>
		                <div class="controls">  
                       	<select name="img_size">
                        	<?php foreach($size as $k=>$v){?>
                            	<option value="<?php echo $v?>" <?php if(isset($_POST['img_size']) && $_POST['img_size'] == $v){ echo "selected";}
								elseif(!isset($_POST['img_size']) && $k == 4){ echo "selected";}
								?>><?php echo $v?></option>
                            <?php }?>
                        </select>
                     </div>
                    </div>
                <div class="form-actions">
	         	<button type="submit" class="btn btn-primary"><i class="icon-qrcode"></i> Oluştur</button>
        		</div>
   			 </form>
                  </div>
                  <div class="tab-pane" id="content">
                      <form action="" method="post" class="form-horizontal">
                     <input type="hidden" name="id" value="content">
                  	<div class="control-group">
                    	<label class="control-label" for="type">Tür</label>
		                <div class="controls">
        		          	<input type="type" name="type" value="<?php if(isset($_POST['type'])) echo $_POST['type'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label" for="size">Boyut</label>
		                <div class="controls">
        		          	<input type="type" name="size" value="<?php if(isset($_POST['size'])) echo $_POST['size'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label" for="content">Yazı</label>
		                <div class="controls">
        		          	<textarea name="content"><?php if(isset($_POST['content'])) echo $_POST['content'];?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label" for="img_size">Boyut  (px)</label>
		                <div class="controls">  
                       	<select name="img_size">
                        	<?php foreach($size as $k=>$v){?>
                            	<option value="<?php echo $v?>" <?php if(isset($_POST['img_size']) && $_POST['img_size'] == $v){ echo "selected";}
								elseif(!isset($_POST['img_size']) && $k == 4){ echo "selected";}
								?>><?php echo $v?></option>
                            <?php }?>
                        </select>
                     </div>
                    </div>
                <div class="form-actions">
	         	<button type="submit" class="btn btn-primary"><i class="icon-qrcode"></i> Oluştur</button>
        		</div>
   			 </form>
                  </div>
                  <div class="tab-pane" id="email">
                      <form action="" method="post" class="form-horizontal">
                      <input type="hidden" name="id" value="email">
                    <div class="control-group">
                    	<label class="control-label" for="email">Email</label>
		                <div class="controls">
	                        <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label" for="subject">Subject</label>
		                <div class="controls">
	                        <input type="text" name="subject" value="<?php if(isset($_POST['subject'])) echo $_POST['subject'];?>">
                        </div>
                    </div>
		              <div class="control-group">
                    	<label class="control-label" for="message">Message</label>
		                <div class="controls">
        		          	<textarea name="message"><?php if(isset($_POST['message'])) echo $_POST['message'];?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label" for="img_size">Size  (px)</label>
		                <div class="controls">  
                       	<select name="img_size">
                        	<?php foreach($size as $k=>$v){?>
                            	<option value="<?php echo $v?>" <?php if(isset($_POST['img_size']) && $_POST['img_size'] == $v){ echo "selected";}
								elseif(!isset($_POST['img_size']) && $k == 4){ echo "selected";}
								?>><?php echo $v?></option>
                            <?php }?>
                        </select>
                     </div>
                    </div>
                <div class="form-actions">
	         	<button type="submit" class="btn btn-primary"><i class="icon-qrcode"></i> Oluştur</button>
        		</div>
   			 </form>
                  </div>
                  <div class="tab-pane" id="geo">
                      <form action="" method="post" class="form-horizontal">
                      <input type="hidden" name="id" value="geo">
                    <div class="control-group">
                    	<label class="control-label" for="lat">Lat</label>
		                <div class="controls">
	                        <input type="text" name="lat" value="<?php if(isset($_POST['lat'])) echo $_POST['lat'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label" for="lon">Lon</label>
		                <div class="controls">
	                        <input type="text" name="lon" value="<?php if(isset($_POST['lon'])) echo $_POST['lon'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                    	<label class="control-label" for="height">Height</label>
		                <div class="controls">
	                        <input type="text" name="height" value="<?php if(isset($_POST['height'])) echo $_POST['height'];?>">
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label" for="img_size">Size  (px)</label>
		                <div class="controls">  
                       	<select name="img_size">
                        	<?php foreach($size as $k=>$v){?>
                            	<option value="<?php echo $v?>" <?php if(isset($_POST['img_size']) && $_POST['img_size'] == $v){ echo "selected";}
								elseif(!isset($_POST['img_size']) && $k == 4){ echo "selected";}
								?>><?php echo $v?></option>
                            <?php }?>
                        </select>
                     </div>
                    </div>
                <div class="form-actions">
	         	<button type="submit" class="btn btn-primary"><i class="icon-qrcode"></i> Oluştur</button>
        		</div>
   			 </form>
                  </div>
                  <div class="tab-pane" id="sms">
                      <form action="" method="post" class="form-horizontal">
                      <input type="hidden" name="id" value="sms">
	                <div class="control-group">
                    	<label class="control-label" for="phone">Telefon</label>
		                <div class="controls">
	                        <input type="text" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>">
                        </div>
                    </div> 
                    <div class="control-group">
                    	<label class="control-label" for="text">Yazı</label>
		                <div class="controls">
        		          	<textarea name="text"><?php if(isset($_POST['text'])) echo $_POST['text'];?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label" for="img_size">Boyut  (px)</label>
		                <div class="controls">  
                       	<select name="img_size">
                        	<?php foreach($size as $k=>$v){?>
                            	<option value="<?php echo $v?>" <?php if(isset($_POST['img_size']) && $_POST['img_size'] == $v){ echo "selected";}
								elseif(!isset($_POST['img_size']) && $k == 4){ echo "selected";}
								?>><?php echo $v?></option>
                            <?php }?>
                        </select>
                     </div>
                    </div>
                <div class="form-actions">
	         	<button type="submit" class="btn btn-primary"><i class="icon-qrcode"></i> Oluştur</button>
        		</div>
   			 </form>
                  </div>
                  <div class="tab-pane" id="text">
                      <form action="" method="post" class="form-horizontal">
                      <input type="hidden" name="id" value="text">
                  <div class="control-group">
                    	<label class="control-label" for="only_text">Yazı</label>
		                <div class="controls">
        		          	<textarea name="only_text"><?php if(isset($_POST['only_text'])) echo $_POST['only_text'];?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label" for="img_size">Boyut  (px)</label>
		                <div class="controls">  
                       	<select name="img_size">
                        	<?php foreach($size as $k=>$v){?>
                            	<option value="<?php echo $v?>" <?php if(isset($_POST['img_size']) && $_POST['img_size'] == $v){ echo "selected";}
								elseif(!isset($_POST['img_size']) && $k == 4){ echo "selected";}
								?>><?php echo $v?></option>
                            <?php }?>
                        </select>
                     </div>
                    </div>
                <div class="form-actions">
	         	<button type="submit" class="btn btn-primary"><i class="icon-qrcode"></i> Oluştur</button>
        		</div>
   			 </form>
                  </div>
                  <div class="tab-pane" id="url">
                      <form action="" method="post" class="form-horizontal">
                      <input type="hidden" name="id" value="url">
                  	<div class="control-group">
                    <label class="control-label" for="only_url">URL</label>
		                <div class="controls">      
                    	<input type="text" name="only_url" value="<?php if(isset($_POST['only_url'])) echo $_POST['only_url'];?>">
                     </div>
                    </div> 
                    <div class="control-group">
                    <label class="control-label" for="img_size">Boyut  (px)</label>
		                <div class="controls">  
                       	<select name="img_size">
                        	<?php foreach($size as $k=>$v){?>
                            	<option value="<?php echo $v?>" <?php if(isset($_POST['img_size']) && $_POST['img_size'] == $v){ echo "selected";}
								elseif(!isset($_POST['img_size']) && $k == 4){ echo "selected";}
								?>><?php echo $v?></option>
                            <?php }?>
                        </select>
                     </div>
                    </div>
                <div class="form-actions">
	         	<button type="submit" class="btn btn-primary"><i class="icon-qrcode"></i> Oluştur</button>
        		</div>
   			 </form> 
                  </div>
                  <div class="tab-pane" id="phone">
                    <form action="" method="post" class="form-horizontal">
                    <input type="hidden" name="id" value="phone">
                  	<div class="control-group">
                    <label class="control-label" for="only_phone">Telefon</label>
		                <div class="controls">      
                    	<input type="text" name="only_phone" value="<?php if(isset($_POST['only_phone'])) echo $_POST['only_phone'];?>">
                     </div>
                    </div> 
                    <div class="control-group">
                    <label class="control-label" for="img_size">Boyut  (px)</label>
		                <div class="controls">  
                       	<select name="img_size">
                        	<?php foreach($size as $k=>$v){?>
                            	<option value="<?php echo $v?>" <?php if(isset($_POST['img_size']) && $_POST['img_size'] == $v){ echo "selected";}
								elseif(!isset($_POST['img_size']) && $k == 4){ echo "selected";}
								?>><?php echo $v?></option>
                            <?php }?>
                        </select>
                     </div>
                    </div>
                <div class="form-actions">
	         	<button type="submit" class="btn btn-primary"><i class="icon-qrcode"></i> Oluştur</button>
        		</div>
   			 </form> 
                  </div>
                  <div class="tab-pane" id="wifi">
                    <form action="" method="post" class="form-horizontal">
                    <input type="hidden" name="id" value="wifi">
                  	<div class="control-group">
                    <label class="control-label" for="type">Tür</label>
		                <div class="controls">      
                        <select name="wifi_type">
                            <option value="WEP" <?php if(isset($_POST['wifi_type']) && $_POST['wifi_type']=="WEP"){echo "selected";}?>>WEP</option>
                            <option value="WPA" <?php if(isset($_POST['wifi_type']) && $_POST['wifi_type']=="WPA"){echo "selected";}?>>WPA/WPA2</option>
                            <option value="nopass" <?php if(isset($_POST['wifi_type']) && $_POST['wifi_type']=="nopass"){echo "selected";}?>>No encryption</option>
                        </select>
                     </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label" for="ssid">ssid</label>
		                <div class="controls">      
                    	<input type="text" name="ssid" value="<?php if(isset($_POST['ssid'])) echo $_POST['ssid'];?>">
                     </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label" for="password">password</label>
		                <div class="controls">      
                    	<input type="text" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'];?>">
                     </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label" for="img_size">Size  (px)</label>
		                <div class="controls">  
                       	<select name="img_size">
                        	<?php foreach($size as $k=>$v){?>
                            	<option value="<?php echo $v?>" <?php if(isset($_POST['img_size']) && $_POST['img_size'] == $v){ echo "selected";}
								elseif(!isset($_POST['img_size']) && $k == 4){ echo "selected";}
								?>><?php echo $v?></option>
                            <?php }?>
                        </select>
                     </div>
                    </div>
                <div class="form-actions">
	         	<button type="submit" class="btn btn-primary"><i class="icon-qrcode"></i> Oluştur</button>
        		</div>
   			 </form>
                  </div>
                </div>
                 
                <script>
                  $(function () {
                    $('#myTab a').click(function (e) {
						 e.preventDefault();
	   					 $(this).tab('show');
					})
                  })
                </script>
  		</div>
        <div class="span4">
        	<div class="well">
            	<h4>QR-Kod Nedir:</h4>
                <p>QR Code, Japonya'da faaliyet gösteren ve Toyota'nın bir yan kuruluşu olan Denso Wave firması tarafından geliştirilen 2 boyutlu bir barkod sistemidir. Adını ingilizcede Çabuk Tepki anlamına gelen Quick Response kelimelerinin baş harflerinden alır</p>
				<p>Yani işin aslı sizin mail adresiniz, telefon numaranız, açık iş/ofis adresiniz, web siteniz ve kişisel bilgilerinizi bulundurabilceğiniz ufak bir kare içerisinde saklandığı alan dır.</p>
            </div>
        <?php if(count($_POST)){?>
        	<div class="well">
            	<h4>Oluşturulan QR-Kod</h4>
        	<?php 
			$img = "CnTR_qrkod".time().".png";
			if(!isset($_POST['img_size'])) $_POST['img_size'] = 174;
			$qr->draw($_POST['img_size'], "img/".$img);?>
            	<div class="center"><img src="img/<?php echo $img?>" width="<?php echo $_POST['img_size']?>" height="<?php echo $_POST['img_size']?>" alt="CnTR QR-Kod Olusturucu"></div>
                <div>
                <div>
                    <div>
                    <div style="text-align:left; color:#000000"><b>Link ( Site Üzerinden Yayın )</b></div>
                    <input type="text" class="span12" value="<?php echo $_SERVER['HTTP_REFERER']?>/img/<?php echo $img?>" onclick="this.select();"></div>
                    <div>
                    <div style="text-align:left; color:#000000"><b>BBCode ( Forumlar için )</b></div>
                    <input type="text" class="span12" value="[url=<?php echo $_SERVER['HTTP_REFERER']?>][img]<?php echo $_SERVER['HTTP_REFERER']?>/img/<?php echo $img?>[/img][/url]" onclick="this.select();"></div>
                    <div>
                    <div style="text-align:left; color:#000000"><b>HTML ( Web Sitenize eklemek için html kod )</b></div>
                    <input type="text" class="span12" value="&lt;a href=&quot;<?php echo $_SERVER['HTTP_REFERER']?>&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;<?php echo $_SERVER['HTTP_REFERER']?>/img/<?php echo $img?>&quot; border=&quot;0&quot; alt=&quot;CnTR QR Kod Olusturucu&quot; /&gt;&lt;/a&gt;"  onclick="this.select();"></div></div>
            </div>
        <?php } ?>   
        <div class="alert alert-info">
            	<h4>Nasıl Taranır:</h4>
                <ol>
                <li>Kullanımı oldukça basittir. Kameraya sahip akıllı bir cep telefonu ve barkod okumaya yardımcı bir uygulama ile bütün QR kodları okuyabilirsiniz. Üstelik bunun için her hangi bir ücrette ödemezsiniz.
                </ol>
            </div> 
        </div>
	</div>
</div>    