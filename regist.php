<?php
include 'master.php';
?>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" 
    	      action="cod6e.php"
    	      method="post"
    	      enctype="multipart/form-data">

    		<h4 class="display-4  fs-1">انشاء حساب</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label class="form-label">ادخل اسمك</label>
		    <input type="text" 
		           class="form-control"
		           name="Fname"
		           value="<?php echo (isset($_GET['Fname']))?$_GET['Fname']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">اسم المستخدم</label>
		    <input type="text" 
		           class="form-control"
		           name="Lname"
		           value="<?php echo (isset($_GET['Lname']))?$_GET['Lname']:"" ?>">
		  </div>

            <div class="mb-3">
                <label class="form-label">ايميل المستخدم</label>
                <input type="text"
                       class="form-control"
                       name="Email"
                       value="<?php echo (isset($_GET['Email']))?$_GET['Email']:"" ?>">
            </div>

		  <div class="mb-3">
		    <label class="form-label">كلمة المرور</label>
		    <input type="password" 
		           class="form-control"
		           name="Password">
		  </div>

            <div class="form-control">
                <label for="">نوع تسجيل الدخول</label>
                <select name="type" id="type">
                    <option value="1">المستفيد</option>
                    <option value="2">موظف توصيل</option>
                </select>
            </div>
		  
		  <button type="submit" name="cod6e" class="btn btn-primary">تسجيل</button>
		  <a href="login.php" class="link-secondary">تسجيل الدخول</a>
		</form>
    </div>
<?php
include 'include/script.php';
include 'include/footer.php';
?>