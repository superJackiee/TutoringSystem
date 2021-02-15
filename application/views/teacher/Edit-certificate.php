<section class="user_section">
      	<div class="container">
    <form class="basic_info_form availab_form" action="<?php echo base_url('teacher/lesson_update') ?>" method="POST">
                <?php      foreach($single_ldata as $single_ldatas) {?>
                    <h3>Edit Lesson</h3>
        <div class="row form_row">
       
                        <div class="form-group col-md-12">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $single_ldatas['title'] ?>"> 
                        </div>
                        <div class="form-group col-md-12">
                        <label>description</label>
                        <textarea name="description" class="form-control" maxlength="200"><?php echo $single_ldatas['description']; ?></textarea>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Language Taught</label>
                            <select name="language_taught" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                                <option selected=""><?php echo $single_ldatas['language_taught']; ?></option>
                                <option value="English">English</option>
                            </select>
                            </div>
                            <div class="form-group col-md-3">
                            <label>Student Language Level</label>
                            <select  name="st_level_from" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                                <option selected=""><?php echo $single_ldatas['st_level_from']; ?></option>
                                <option value="A1">A1</option>
                                <option value="A2">A2</option>
                                <option value="B1">B1</option>
                                <option value="B2">B2</option>
                                <option value="C1">C1</option>
                                <option value="C2">C2</option>
                            </select>
                            <!-- <span>—</span> -->
                            </div>
                            <div class="form-group col-md-3">  
                            <select  name="st_level_to" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                                <option selected=""><?php echo $single_ldatas['st_level_to']; ?></option>
                                <option value="A1">A1</option>
                                <option value="A2">A2</option>
                                <option value="B1">B1</option>
                                <option value="B2">B2</option>
                                <option value="C1">C1</option>
                                <option value="C2">C2</option>
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                            <label>Category</label>
                            <select  id="category" name="category" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                               <option selected=""><?php echo $single_ldatas['category']; ?></option>
                                <option value="General">General</option>
                                <option value="Business">Business</option>
                                <option value="Preparation">Test Preparation</option>
                                <option value="Kids">Kids</option>
                                <option value="Conversation">Conversation Practice</option>
                            </select>
                            </div>
                            <div class="form-group col-md-6">
                            <label>Lesson Tags</label>
                            <select  id="lesson" name="lesson" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                            <option selected=""><?php echo $single_ldatas['lesson']; ?></option>
                            </select>
                            </div>
                            <div class="form-group col-md-3">
                            <label>Individual Lessons</label>
                                <div class="lesson_price">
                                    <input type="text" name="lesson_price" class="form-control" placeholder="Price" value="<?php echo $single_ldatas['lesson_price'] ?>">
                                    <span>/<?php  echo $single_ldatas['lesson_time'];?></span>
                                </div>
                            </div>
                    <div class="form-group col-md-4">
                    <label>Packages</label>
                    <select  name="lesson_package" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                        <option selected=""><?php  echo $single_ldatas['lesson_package'];?></option>
                        <option value="N/A">N/A</option>
                        <option value="5">5 Lessons</option>
                        <option value="10">10 Lessons</option>
                        <option value="20">20 Lessons</option>
                    </select>
                    </div>
                    <div class="form-group col-md-3">  
                    <label>Total</label>
                    <input type="text" name="total_price" class="form-control" placeholder="Price" value="<?php  echo $single_ldatas['total_price'];?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="switch">
                        <?php  if($single_ldatas['status'] == '1'){ ?>
                              <input name="status" value="0" type="checkbox" class="success" checked>
                              <span class="slider round"></span>
                        <?php }else {?>
                                    <input name="status" value="1" type="checkbox" class="success">
                                    <span class="slider round"></span>
                        <?php     } ?>
                        </label>
                    </div>
                </div>
                <input type="hidden" name="lesson_id"  value="<?php  echo $single_ldatas['lesson_id'];?>">
                <input type="submit"  class="change_photo save"  name="" value="Save" >
            <?php 
    }?>
</form>
</div>
</section>

 