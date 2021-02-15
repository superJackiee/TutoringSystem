<!----------------------- Education modal End-------------------------------->
<div id="myEducation" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title center">Add a new Education</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="basic_info_form availab_form" action="<?php echo base_url('teacher/add_education') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
               <div class="row form_row">
                  <div class="form-group col-md-4">
                     <label>From</label>
                     <select  name="from_institute" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                     <option value="1989">1989</option><option value="2004">2004</option>
                        <option value="1990">1990</option><option value="2005">2005</option>
                        <option value="1991">1991</option><option value="2006">2006</option>
                        <option value="1992">1992</option><option value="2007">2007</option>
                        <option value="1993">1993</option><option value="2008">2008</option>
                        <option value="1994">1994</option><option value="2009">2009</option>
                        <option value="1995">1995</option><option value="2010">2010</option>
                        <option value="1996">1996</option><option value="2011">2011</option>
                        <option value="1997">1997</option><option value="2012">2012</option>
                        <option value="1998">1998</option><option value="2013">2013</option>
                        <option value="1999">1999</option><option value="2014">2014</option>
                        <option value="2000">2000</option><option value="2015">2015</option>
                        <option value="2001">2001</option><option value="2016">2016</option>
                        <option value="2002">2002</option><option value="2017">2017</option>
                        <option value="2003">2003</option><option value="2018">2018</option>
                     </select>
                  </div>
                  <div class="form-group col-md-4">  
                     <label>To</label>
                     <select  name="to_institute" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                        <option selected>2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                     </select>
                  </div>

                  <div class="form-group col-md-6">
                     <label>Institution</label>
                     <input type="text" name="institute" class="form-control" >
                  </div>
                  <div class="form-group col-md-6">  
                     <label>Major / Topic</label>
                     <input type="text" name="topic" class="form-control" >
                  </div>
                  <div class="form-group col-md-12">
                  <label>Degree</label>
                  <select  name="degree" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                        <option>Choose</option>
                        <option value="General">Bachelor</option>
                        <option value="Business">Master's</option>
                        <option value="Preparation">Doctorate</option>
                        <option value="Kids">Postdoctoral</option>
                     </select>
                  </div>
                  <div class="form-group col-md-12">
                  <label>Description (Optional)</label>
                  <textarea name="Edu_description" class="form-control" maxlength="200"> </textarea>
                  </div>
                     <div class="video_text_part col-md-12">
                     <p>Attachment (Scanned and in color)</p>
                        <ul>
                           <li><i class="fas fa-circle size_circle"></i><p>Max 2MB</p></li>
                           <li><i class="fas fa-circle size_circle"></i><p>PDF or JPG file</p></li>
                           <li><i class="fas fa-circle size_circle"></i><p>Visible to italki staff only</p></li>
                        </ul>
                     </div>
                     <div class="form-group col-md-12">
                     <input type="file" name="diploma_upload" value="Diploma uploaded" class="change_photo video">
                     </div>   
               </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="user_id" id="modal_user_id" value="">
                <input type="submit"  class="change_photo save"  name="" value="Save" >
                <button type="button" class="change_photo save" data-dismiss="modal">Close</button>
            </div>
               </form>
        </div>
    </div>
</div>
<!--------------------Education modal End--------------------------->
<!----------------------- Work modal End-------------------------------->
<div id="mywork" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title center">Add Work Experience</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="basic_info_form availab_form" action="<?php echo base_url('teacher/add_work') ?>" method="POST">
            <div class="modal-body">
               <div class="row form_row">
                  <div class="form-group col-md-4">
                     <label>From</label>
                     <select  name="from_work" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                        <option selected="">1989</option><option value="2004">2004</option>
                        <option value="1990">1990</option><option value="2005">2005</option>
                        <option value="1991">1991</option><option value="2006">2006</option>
                        <option value="1992">1992</option><option value="2007">2007</option>
                        <option value="1993">1993</option><option value="2008">2008</option>
                        <option value="1994">1994</option><option value="2009">2009</option>
                        <option value="1995">1995</option><option value="2010">2010</option>
                        <option value="1996">1996</option><option value="2011">2011</option>
                        <option value="1997">1997</option><option value="2012">2012</option>
                        <option value="1998">1998</option><option value="2013">2013</option>
                        <option value="1999">1999</option><option value="2014">2014</option>
                        <option value="2000">2000</option><option value="2015">2015</option>
                        <option value="2001">2001</option><option value="2016">2016</option>
                        <option value="2002">2002</option><option value="2017">2017</option>
                        <option value="2003">2003</option><option value="2018">2018</option>
                       
                     </select>
                  </div>
                  <div class="form-group col-md-4">  
                     <label>To</label>
                     <select  name="to_work" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                        <option selected="">2017</option>
                        <option value="2022">2018</option>
                        <option value="2022">2019</option>
                        <option value="2022">2020</option>
                        <option value="2022">2021</option>
                        <option value="2022">2022</option>
                        <option value="2022">2023</option>
                        <option value="2023">2024</option>
                        <option value="2024">2025</option>
                     </select>
                  </div>

                  <div class="form-group col-md-6">
                     <label>Company</label>
                     <input type="text" name="company" class="form-control" >
                  </div>
                  <div class="form-group col-md-6">  
                     <label>Position</label>
                     <input type="text" name="position" class="form-control" >
                  </div>

                  <div class="form-group col-md-6">
                     <label>Country / Region</label>
                     <select name="country_work" class="custom-select animations-select arrow_des" id="inputGroupSelect01" data-target="#animation-bottom">                                     
                     <?php foreach($country as $countrys) {
                        echo "<option value=".$countrys.">".$countrys."</option>";
                                 }?>
                     </select>
                  </div>
                  <div class="form-group col-md-6">  
                     <label>City</label>
                     <input type="text" name="city_work" class="form-control" >
                  </div>
                  <div class="form-group col-md-12">
                  <label>Description (Optional)</label>
                  <textarea name="work_description" class="form-control" maxlength="200"> </textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="user_id" id="work_id" value="">
                <input type="submit"  class="change_photo save"  name="" value="Save" >
                <button type="button" class="change_photo save" data-dismiss="modal">Close</button>
            </div>
               </form>
        </div>
    </div>
</div>
<!--------------------Work modal End--------------------------->
<!----------------------- Certificate modal End-------------------------------->
<div id="certificates" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title center">Add Certificate</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="basic_info_form availab_form" action="<?php echo base_url('teacher/add_certificate') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
               <div class="row form_row">
                  <div class="form-group col-md-3">
                     <label>From</label>
                     <select  name="from_cerftificate" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                        <option selected="">1989</option><option value="2004">2004</option>
                        <option value="1990">1990</option><option value="2005">2005</option>
                        <option value="1991">1991</option><option value="2006">2006</option>
                        <option value="1992">1992</option><option value="2007">2007</option>
                        <option value="1993">1993</option><option value="2008">2008</option>
                        <option value="1994">1994</option><option value="2009">2009</option>
                        <option value="1995">1995</option><option value="2010">2010</option>
                        <option value="1996">1996</option><option value="2011">2011</option>
                        <option value="1997">1997</option><option value="2012">2012</option>
                        <option value="1998">1998</option><option value="2013">2013</option>
                        <option value="1999">1999</option><option value="2014">2014</option>
                        <option value="2000">2000</option><option value="2015">2015</option>
                        <option value="2001">2001</option><option value="2016">2016</option>
                        <option value="2002">2002</option><option value="2017">2017</option>
                        <option value="2003">2003</option><option value="2018">2018</option>
                       
                     </select>
                  </div>
                  <div class="row form_row">
                  <div class="form-group col-md-6">
                     <label>Certificate Name</label>
                     <input type="text" name="certificate" class="form-control" >
                  </div>
                  <div class="form-group col-md-6">  
                     <label>Institution</label>
                     <input type="text" name="inst_certificate" class="form-control" >
                  </div>
                  </div>
                  <div class="form-group col-md-12">
                  <label>Description (Optional)</label>
                  <textarea name="desc_work_" class="form-control" maxlength="200"> </textarea>
                  </div>
                  <div class="video_text_part col-md-12">
                     <p>Attachment (Scanned and in color)</p>
                        <ul>
                           <li><i class="fas fa-circle size_circle"></i><p>Max 2MB</p></li>
                           <li><i class="fas fa-circle size_circle"></i><p>PDF or JPG file</p></li>
                           <li><i class="fas fa-circle size_circle"></i><p>Visible to italki staff only</p></li>
                        </ul>
                     </div>
                  <div class="form-group col-md-12">
                  <input type="file" name="certificate_upload" value="CHOOSE FILE" class="change_photo video">
                  </div>   
               </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="user_id" id="cert_id" value="">
                <input type="submit"  class="change_photo save"  name="" value="Save" >
                <button type="button" class="change_photo save" data-dismiss="modal">Close</button>
            </div>
               </form>
        </div>
    </div>
</div>
<!--------------------Certificate modal End--------------------------->


<!-- add lesson Modal -->
<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title center">Add a new Lesson</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <form class="basic_info_form availab_form" action="<?php echo base_url('teacher/lesson_add') ?>" method="POST">
            <div class="modal-body">
               <div class="row form_row">
                  <div class="form-group col-md-12">
                     <label>Title</label>
                     <input type="text" name="title" class="form-control" >
                  </div>
                  <div class="form-group col-md-12">
                     <label>description</label>
                     <textarea name="description" class="form-control" maxlength="200"> </textarea>
                  </div>
                  <div class="form-group col-md-5">
                     <label>Language Taught</label>
                     <select name="language_taught" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                        <option value="English">English</option>
                        <option value="French">French</option>
                        <option value="Spanish">Spanish</option>
                        <option value="Portuguese">Portuguese</option>
                        <option value="Japanese">Japanese</option>
                        <option value="Korean">Korean</option>
                        <option value="Arabic">Arabic</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Italian">Italian</option>
                        <option value="Russian">Russian</option>
                        <option value="Afrikaans">Afrikaans</option>
                        <option value="Akan Twi">Akan Twi</option>
                        <option value="Albanian">Albanian</option>
                        <option value="American Sign Language (ASL)">American Sign Language (ASL)</option>
                        <option value="Amharic">Amharic</option>
                        <option value="Argentine Sign Language">Argentine Sign Language</option>
                        <option value="Armenian">Armenian</option>
                        <option value="Azeri">Azeri</option>
                        <option value="Arabic (Egyptian)">Arabic (Egyptian)</option>
                        <option value="Arabic (Gulf)">Arabic (Gulf)</option>
                        <option value="Arabic (Modern Standard)">Arabic (Modern Standard)</option>
                        <option value="Arabic(Sudanese)">Arabic(Sudanese)</option>
                        <option value="Arabic (Maghrebi)">Arabic (Maghrebi)</option>
                        <option value="Arabic (Levantine)">Arabic (Levantine)</option>
                        <option value="Alsatian">Alsatian</option>
                        <option value="Assamese">Assamese</option>
                        <option value="Aiki (Kibet)">Aiki (Kibet)</option>
                        <option value="Aiki (Runga)">Aiki (Runga)</option>
                        <option value="Ainu">Ainu</option>
                        <option value="Aragonese">Aragonese</option>
                        <option value="Aramaic">Aramaic</option>
                        <option value="Aromanian">Aromanian</option>
                        <option value="Assiniboine (Nakota)">Assiniboine (Nakota)</option>
                        <option value="Austrian German">Austrian German</option>
                        <option value="Australian Sign Language (Auslan)">Australian Sign Language (Auslan)</option>
                        <option value="Avar">Avar</option>
                        <option value="Aymara">Aymara</option>
                        <option value="Azerbaijani">Azerbaijani</option>
                        <option value="Basque">Basque</option>
                        <option value="Belait">Belait</option>
                        <option value="Belarusian">Belarusian</option>
                        <option value="Bengali">Bengali</option>
                        <option value="Bosnian">Bosnian</option>
                        <option value="Brazilian Sign Language (LIBRAS)">Brazilian Sign Language (LIBRAS)</option>
                        <option value="British Sign Language (BSL)">British Sign Language (BSL)</option>
                        <option value="Bulgarian">Bulgarian</option>
                        <option value="Burmese">Burmese</option>
                        <option value="Balochi">Balochi</option>
                        <option value="Blackfoot (Niitsi'powahsin)">Blackfoot (Niitsi'powahsin)</option>
                        <option value="Breton">Breton</option>
                        <option value="Balinese">Balinese</option>
                        <option value="Bago-Kusuntu">Bago-Kusuntu</option>
                        <option value="Bagri">Bagri</option>
                        <option value="Bambara (Bamanankan)">Bambara (Bamanankan)</option>
                        <option value="Banjar">Banjar</option>
                        <option value="Barawana (Baré)">Barawana (Baré)</option>
                        <option value="Bari">Bari</option>
                        <option value="Batak Toba">Batak Toba</option>
                        <option value="Bats">Bats</option>
                        <option value="Bavarian">Bavarian</option>
                        <option value="Beja">Beja</option>
                        <option value="Bhojpuri">Bhojpuri</option>
                        <option value="Bislama">Bislama</option>
                        <option value="Bugis">Bugis</option>
                        <option value="Catalan">Catalan</option>
                        <option value="Cebuano">Cebuano</option>
                        <option value="Chinese (Cantonese)">Chinese (Cantonese)</option>
                        <option value="Chinese (Hakka)">Chinese (Hakka)</option>
                        <option value="Chinese (Hokkien)">Chinese (Hokkien)</option>
                        <option value="Chinese (Shanghainese)">Chinese (Shanghainese)</option>
                        <option value="Chinese (Taiwanese)">Chinese (Taiwanese)</option>
                        <option value="Chinese (Other)">Chinese (Other)</option>
                        <option value="Croatian">Croatian</option>
                        <option value="Czech">Czech</option>
                        <option value="Cornish">Cornish</option>
                        <option value="Corsican">Corsican</option>
                        <option value="Cree">Cree</option>
                        <option value="Cherokee">Cherokee</option>
                        <option value="Chewa (Chichewa)">Chewa (Chichewa)</option>
                        <option value="Chavacano">Chavacano</option>
                        <option value="Chechen">Chechen</option>
                        <option value="Chibarwe">Chibarwe</option>
                        <option value="Chiquitano">Chiquitano</option>
                        <option value="Choctaw">Choctaw</option>
                        <option value="Chukchi">Chukchi</option>
                        <option value="Chuwabu">Chuwabu</option>
                        <option value="Coptic">Coptic</option>
                        <option value="Crow">Crow</option>
                        <option value="Danish">Danish</option>
                        <option value="Dutch">Dutch</option>
                        <option value="Dzongkha">Dzongkha</option>
                        <option value="Dari">Dari</option>
                        <option value="Dothraki">Dothraki</option>
                        <option value="Daakaka">Daakaka</option>
                        <option value="Dakota">Dakota</option>
                        <option value="Daza">Daza</option>
                        <option value="Dela-Oenale">Dela-Oenale</option>
                        <option value="Dinka">Dinka</option>
                        <option value="Domari">Domari</option>
                        <option value="Dotyali">Dotyali</option>
                        <option value="Drehu">Drehu</option>
                        <option value="Esperanto">Esperanto</option>
                        <option value="Estonian">Estonian</option>
                        <option value="Erzya">Erzya</option>
                        <option value="Ewe">Ewe</option>
                        <option value="Ewondo (Fang)">Ewondo (Fang)</option>
                        <option value="Filipino (Tagalog)">Filipino (Tagalog)</option>
                        <option value="Finnish">Finnish</option>
                        <option value="Flemish">Flemish</option>
                        <option value="Faroese">Faroese</option>
                        <option value="Frisian">Frisian</option>
                        <option value="Fijian (ITaukei)">Fijian (ITaukei)</option>
                        <option value="Fon (Fon gbè)">Fon (Fon gbè)</option>
                        <option value="Friulian">Friulian</option>
                        <option value="Fulah">Fulah</option>
                        <option value="Fur">Fur</option>
                        <option value="Gaelic (Irish)">Gaelic (Irish)</option>
                        <option value="Gaelic (Scottish)">Gaelic (Scottish)</option>
                        <option value="Galician">Galician</option>
                        <option value="Georgian">Georgian</option>
                        <option value="Greek">Greek</option>
                        <option value="Greek (Ancient)">Greek (Ancient)</option>
                        <option value="Greenlandic">Greenlandic</option>
                        <option value="Gujarati">Gujarati</option>
                        <option value="Ga">Ga</option>
                        <option value="Guarani">Guarani</option>
                        <option value="Gaelic (Manx)">Gaelic (Manx)</option>
                        <option value="Gallo">Gallo</option>
                        <option value="Garifuna">Garifuna</option>
                        <option value="Gikuyu">Gikuyu</option>
                        <!-- <option value="Greenlandic">Greenlandic</option> -->
                        <option value="Guambiano">Guambiano</option>
                        <option value="Gullah">Gullah</option>
                        <option value="Gullah (Afro-Seminole Creole)">Gullah (Afro-Seminole Creole)</option>
                        <option value="Haitian Creole">Haitian Creole</option>
                        <option value="Hausa">Hausa</option>
                        <!-- <option value=""></option> -->
                        <option value="Hebrew">Hebrew</option>
                        <option value="Hmong">Hmong</option>
                        <option value="Hungarian">Hungarian</option>
                        <option value="Hawaiian Pidgin (Hawaiian Creole English)">Hawaiian Pidgin (Hawaiian Creole English)</option>
                        <option value="Honduran Sign Language (LESHO)">Honduran Sign Language (LESHO)</option>
                        <option value="Icelandic">Icelandic</option>
                        <option value="Indonesian">Indonesian</option>
                        <option value="Igbo">Igbo</option>
                        <option value="Inuktitut">Inuktitut</option>
                        <option value="Iban">Iban</option>
                        <option value="Ingush">Ingush</option>
                        <option value="International Sign (IS)">International Sign (IS)</option>
                        <option value="Ido">Ido</option>
                        <option value="Inuinnaqtun">Inuinnaqtun</option>
                        <option value="Inuvialuktun">Inuvialuktun</option>
                        <option value="Ixcatec">Ixcatec</option>
                        <option value="Javanese">Javanese</option>
                        <option value="Japanese (Okinawan)">Japanese (Okinawan)</option>
                        <option value="Japanese Sign Language">Japanese Sign Language</option>
                        <option value="Jamaican Creole">Jamaican Creole</option>
                        <option value="Judeo-Tat">Judeo-Tat</option>
                        <option value="Kannada">Kannada</option>
                        <option value="Kazakh">Kazakh</option>
                        <option value="Kinyarwanda">Kinyarwanda</option>
                        <option value="Khmer (Cambodian)">Khmer (Cambodian)</option>
                        <option value="Klingon">Klingon</option>
                        <option value="Kurdish">Kurdish</option>
                        <option value="Kyrgyz">Kyrgyz</option>
                        <option value="Kekchi (Q'eqchi')">Kekchi (Q'eqchi')</option>
                        <option value="K'iche'">K'iche'</option>
                        <option value="">Kachin (Jingpho)</option>
                        <option value="Kachin (Jingpho)">Kalanga</option>
                        <option value="Kalmyk Oirat">Kalmyk Oirat</option>
                        <option value="Kanuri">Kanuri</option>
                        <option value="Kenjeje">Kenjeje</option>
                        <option value="Khmu">Khmu</option>
                        <option value="Khoemana">Khoemana</option>
                        <option value="Kirundi">Kirundi</option>
                        <option value="Koisan (Tsoa)">Koisan (Tsoa)</option>
                        <option value="Konkani">Konkani</option>
                        <option value="Lao">Lao</option>
                        <option value="Latin">Latin</option>
                        <option value="Latvian">Latvian</option>
                        <option value="Lithuanian">Lithuanian</option>
                        <option value="Luo">Luo</option>
                        <option value="Luxembourgish">Luxembourgish</option>
                        <option value="Lakota">Lakota</option>
                        <option value="Ladino (Judeo-Spanish)">Ladino (Judeo-Spanish)</option>
                        <option value="Ladin">Ladin</option>
                        <option value="Lau">Lau</option>
                        <option value="Limburgish">Limburgish</option>
                        <option value="Litzlitz (Naman)">Litzlitz (Naman)</option>
                        <option value="Lombard">Lombard</option>
                        <option value="Macedonian">Macedonian</option>
                        <option value="Malagasy">Malagasy</option>
                        <option value="Malay">Malay</option>
                        <option value="Malayalam">Malayalam</option>
                        <option value="Maltese">Maltese</option>
                        <option value="Maori">Maori</option>
                        <option value="Marathi">Marathi</option>
                        <option value="Mongolian">Mongolian</option>
                        <option value="Maasai">Maasai</option>
                        <option value="Maithili">Maithili</option>
                        <option value="Mamuju">Mamuju</option>
                        <option value="Manchu">Manchu</option>
                        <option value="Mandingo (Madinka)">Mandingo (Madinka)</option>
                        <option value="Manggarai">Manggarai</option>
                        <option value="Mapudungun">Mapudungun</option>
                        <option value="Marri Ngarr">Marri Ngarr</option>
                        <option value="Masalit">Masalit</option>
                        <option value="Mekeo">Mekeo</option>
                        <option value="Mexican Sign Language (LSM)">Mexican Sign Language (LSM)</option>
                        <option value="Minangkabau">Minangkabau</option>
                        <option value="Mingrelian">Mingrelian</option>
                        <option value="Mirandese">Mirandese</option>
                        <option value="Miyako">Miyako</option>
                        <option value="Mon">Mon</option>
                        <option value="Maloptionian (Dhivehi)">Maloptionian (Dhivehi)</option>
                        <option value="Marshallese">Marshallese</option>
                        <option value="Mauritian Creole">Mauritian Creole</option>
                        <option value="Mazatec">Mazatec</option>
                        <option value="Montenegrin">Montenegrin</option>
                        <option value="Mnong">Mnong</option>
                        <option value="Nahuatl">Nahuatl</option>
                        <option value="Nepali">Nepali</option>
                        <option value="Norwegian">Norwegian</option>
                        <option value="Nambya">Nambya</option>
                        <option value="Neapolitan (Napoletano)">Neapolitan (Napoletano)</option>
                        <option value="Natchez">Natchez</option>
                        <option value="Navajo (Diné bizaad)">Navajo (Diné bizaad)</option>
                        <option value="Ndebele">Ndebele</option>
                        <option value="Neverver">Neverver</option>
                        <option value="Newar">Newar</option>
                        <option value="Nigerian Pidgin">Nigerian Pidgin</option>
                        <option value="North Efate (Nakanamanga)">North Efate (Nakanamanga)</option>
                        <option value="Nubian (Midob)">Nubian (Midob)</option>
                        <option value="Nubian (Nobiin)">Nubian (Nobiin)</option>
                        <option value="Nuer">Nuer</option>
                        <option value="Ojibwe">Ojibwe</option>
                        <option value="Ogiek (Akiek)">Ogiek (Akiek)</option>
                        <option value="Okinawan">Okinawan</option>
                        <option value="Oromo">Oromo</option>
                        <option value="Pashto">Pashto</option>
                        <option value="Persian (Farsi)">Persian (Farsi)</option>
                        <option value="Polish">Polish</option>
                        <option value="Punjabi">Punjabi</option>
                        <option value="Papiamento">Papiamento</option>
                        <option value="Pa'o">Pa'o</option>
                        <option value="Palauan">Palauan</option>
                        <option value="Quechua">Quechua</option>
                        <option value="Rohingya">Rohingya</option>
                        <option value="Romanian">Romanian</option>
                        <option value="Romani (Balkan)">Romani (Balkan)</option>
                        <option value="Romani (Sinte)">Romani (Sinte)</option>
                        <option value="Romani (Vlax)">Romani (Vlax)</option>
                        <option value="Romansch">Romansch</option>
                        <option value="Samoan">Samoan</option>
                        <option value="Sanskrit">Sanskrit</option>
                        <option value="Serbian">Serbian</option>
                        <option value="Sindhi">Sindhi</option>
                        <option value="Sinhala">Sinhala</option>
                        <option value="Sicilian">Sicilian</option>
                        <option value="Slovak">Slovak</option>
                        <option value="Slovenian">Slovenian</option>
                        <option value="Somali">Somali</option>
                        <option value="Swahili">Swahili</option>
                        <option value="Swedish">Swedish</option>
                        <option value="Scots">Scots</option>
                        <option value="Swiss German">Swiss German</option>
                        <option value="Syriac">Syriac</option>
                        <option value="Sa">Sa</option>
                        <option value="Saami (Kildin)">Saami (Kildin)</option>
                        <option value="Saami (Lule)">Saami (Lule)</option>
                        <option value="Saami (Northern)">Saami (Northern)</option>
                        <option value="Sardinian">Sardinian</option>
                        <option value="Sekani">Sekani</option>
                        <option value="Sena">Sena</option>
                        <option value="Sfyria">Sfyria</option>
                        <option value="Shan">Shan</option>
                        <option value="Sherpa">Sherpa</option>
                        <option value="Shona">Shona</option>
                        <option value="Shona (Ndau)">Shona (Ndau)</option>
                        <option value="Shoshoni">Shoshoni</option>
                        <option value="Shumashti">Shumashti</option>
                        <option value="Sign Language(Other)">Sign Language(Other)</option>
                        <option value="Silbo Gomero">Silbo Gomero</option>
                        <option value="Sotho">Sotho</option>
                        <option value="Sundanese">Sundanese</option>
                        <option value="Swazi">Swazi</option>
                        <option value="Swiss-French Sign Language">Swiss-French Sign Language</option>
                        <option value="Swiss-German Sign Language">Swiss-German Sign Language</option>
                        <option value="Tajik">Tajik</option>
                        <option value="Berber (Tamazight)">Berber (Tamazight)</option>
                        <option value="Tamil">Tamil</option>
                        <option value="Tatar">Tatar</option>
                        <option value="Telugu">Telugu</option>
                        <option value="Thai">Thai</option>
                        <option value="Tibetan">Tibetan</option>
                        <option value="Turkish">Turkish</option>
                        <option value="Turkmen">Turkmen</option>
                        <option value="Tutong">Tutong</option>
                        <option value="Toki Pona">Toki Pona</option>
                        <option value="Tamang">Tamang</option>
                        <option value="Tharu">Tharu</option>
                        <option value="Tigrinya">Tigrinya</option>
                        <option value="Tlingit">Tlingit</option>
                        <option value="Tongan">Tongan</option>
                        <option value="Tsonga (Xitsonga)">Tsonga (Xitsonga)</option>
                        <option value="Tswana">Tswana</option>
                        <option value="Tz’utujil">Tz’utujil</option>
                        <option value="Ukrainian">Ukrainian</option>
                        <option value="Urdu">Urdu</option>
                        <option value="Uyghur">Uyghur</option>
                        <option value="Uzbek">Uzbek</option>
                        <option value="Vietnamese">Vietnamese</option>
                        <option value="Venda">Venda</option>
                        <option value="Welsh">Welsh</option>
                        <option value="Wolof">Wolof</option>
                        <option value="Waray">Waray</option>
                        <option value="Wayuu">Wayuu</option>
                        <option value="Wyandot">Wyandot</option>
                        <option value="Xhosa">Xhosa</option>
                        <option value="Yakut">Yakut</option>
                        <option value="Yiddish">Yiddish</option>
                        <option value="Yoruba">Yoruba</option>
                        <option value="Yucatec Maya">Yucatec Maya</option>
                        <option value="Yola">Yola</option>
                        <option value="Yugoslavian Sign Language">Yugoslavian Sign Language</option>
                        <option value="Zhuang">Zhuang</option>
                        <option value="Zulu">Zulu</option>
                        <option value="Zaghawa (Beria)">Zaghawa (Beria)</option>
                        <option value="Zapotec">Zapotec</option>
                        <option value="Zarma">Zarma</option>
                        <option value="Zaza (Northern)">Zaza (Northern)</option>
                        <option value="Occitan">Occitan</option>
                        <option value="Odia">Odia</option>
                        <option value="Oneida">Oneida</option>
                     </select>
                  </div>
                  <div class="form-group col-md-3">
                     <label>Student Language Level</label>
                     <select  name="st_level_from" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <option value="B1">B1</option>
                        <option value="B2">B2</option>
                        <option value="C1">C1</option>
                        <option value="C2">C2</option>
                     </select>
                  </div>
                  <div class="form-group col-md-3">  
                     <select  name="st_level_to" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
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
                        <option>Choose</option>
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
                     </select>
                  </div>
                  <div class="form-group col-md-5">
                     <label>Individual Lessons</label>
                     <div class="lesson_price">
                        <input type="text" name="lesson_price" class="form-control" placeholder="Price" value="">
                        <span>/60 min</span>
                     </div>
                  </div>
                  <div class="form-group col-md-3">
                     <label>Packages</label>
                     <select  name="lesson_package" class="custom-select animations-select arrow_des" id="inputGroupSelect03" data-target="#animation-bottom">
                        <option selected="">N/A</option>
                        <option value="5">5 Lessons</option>
                        <option value="10">10 Lessons</option>
                        <option value="20">20 Lessons</option>
                     </select>
                  </div>
                  <div class="form-group col-md-3">  
                     <label>Total</label>
                     <input type="text" name="total_price" class="form-control" placeholder="Price">
                  </div>
                  <div class="form-group col-md-6">
                     <label class="switch">
                        <input name="status" value="1" type="checkbox" class="success">
                        <span class="slider round"></span>
                     </label>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_detail[0]['id']; ?>">
               <input type="submit"  class="change_photo save"  name="" value="Save" >
               <button type="button" class="change_photo save" data-dismiss="modal">Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!----------------------------------------------->


<!------------------ Add Trial lesson start------------------->
<div id="add_trail" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title center">Add a new Lesson</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="basic_info_form availab_form" action="<?php echo base_url('teacher/lesson_add') ?>" method="POST">
            <input type="hidden" name="user_id" id="_id" value="">
            <div class="modal-body">
               <div class="row form_row">
                  <div class="form-group col-md-12">
                  <label>description</label>
                  <textarea name="description" class="form-control" maxlength="200"></textarea>
                  </div>
                     <div class="form-group col-md-12">                   
                        <label>Individual Lessons</label>
                        <div class="lesson_price">
                        <input type="text" name="lesson_price" class="form-control" placeholder="Price" value="">
                        <span>/30 min</span>
                        </div>
                     </div>
                     <div class="form-group col-md-6">
                        <label class="switch">
                              <input name="status" value="1" type="checkbox" class="success">
                              <span class="slider round"></span>
                        </label>
                     </div>
               </div>
            </div>
            <div class="modal-footer">
               <input type="hidden" name="lesson_type"  value="2">
                <input type="submit"  class="change_photo save"  name="" value="Save" >
                <button type="button" class="change_photo save" data-dismiss="modal">Close</button>
            </div>
               </form>
        </div>
    </div>
</div>


<!-------------Edit modal lesson end--------------------->




<!-------------Edit modal trial--------------------->

<div id="edit_trail" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title center">Add a new Lesson</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form class="basic_info_form availab_form" action="<?php echo base_url('teacher') ?>" method="POST">
            <div class="modal-body">
               <div class="row form_row">
                  <div class="form-group col-md-12">
                  <label>description</label>
                  <textarea name="description" class="form-control" maxlength="200"><?php echo $trial_lesson[0]['description'] ?></textarea>
                  </div>
                     <div class="form-group col-md-12">                   
                        <label>Individual Lessons</label>
                        <div class="lesson_price">
                        <input type="text" name="lesson_price" class="form-control" placeholder="Price" value="<?php echo $trial_lesson[0]['lesson_price'] ?>">
                        <span>/<?php  echo $trial_lesson[0]['lesson_time'];?></span>
                        </div>
                     </div>
                     <div class="form-group col-md-6">
                        <label class="switch">
                        <?php  if($trial_lesson[0]['status'] == '1'){ ?>
                            <input name="status" value="0" type="checkbox" class="success" checked>
                              <span class="slider round"></span>
                        <?php }else {?>
                                    <input name="status" value="1" type="checkbox" class="success">
                                    <span class="slider round"></span>
                           <?php     } ?>
                        </label>
                     </div>
               </div>
            </div>
            <div class="modal-footer">
               <input type="hidden" name="lesson_id" id="lesson_" value="">
                <input type="submit"  class="change_photo save"  name="" value="Save" >
                <button type="button" class="change_photo save" data-dismiss="modal">Close</button>
            </div>
               </form>
        </div>
    </div>
</div>

<!------------------------------>





<style>
.modal{
    z-index: 1500;
}
.modal-dialog {
    max-width: 720px;
}
.modal-content{
   border-radius: 0.9rem;
    outline: 0;
    box-shadow: 0px 1px 14px 0px #6c757d;
    padding: 10px;
}
.lessSettingFont18 {
    font-size: 18px;
    margin-left: 8px;
    margin-top: 11px;
}
.lesson_price {
    display: flex;
}
.lesson_price span {
    font-size: 18px;
    margin-left: 8px;
    margin-top: 10px;
    width: 40%;
}
</style>
 


<script>
var options="";
$("#category").on('change',function(){
    var value=$(this).val();
    if(value=="General")
    {
         options="<option>Choose</option>"
          		+"<option value='Grammar'>Grammar</option>"
      	 		+"<option value='Spelling'>Spelling</option>"
               +"<option value='Reading'>Reading</option>"
               +"<option value='Listening'>Listening</option>"
               +"<option value='Writing'>Writing</option>";
        $("#lesson").html(options);
    }
    else if(value=="Business")
    {
        options='<option>Choose</option>'
               +'<option value="Presentation">Meeting</option>'
      		   +'<option value="Presentation">Presentation</option>'
               +'<option value="Interview">Job Interview</option>'
               +'<option value="Negotiation">Negotiation</option>'
               +'<option value="Business">Business Etiquette</option>'
               +'<option value="Industry">Industry Terminology</option>';
        $("#lesson").html(options);
    }else
        $("#lesson").find('option').remove()
});
</script>