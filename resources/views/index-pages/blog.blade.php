@extends('layouts.index')

@section('header')
<section class="about mini_header">
   <x-index.header></x-index.header>
</section>
@endsection
@section('content')
<section class="section-80 index-page block">
   <div class="title red-underline my-5">Our Blogs</div>
   <div class="row my-5">
      <div class="col half">
         <p class="txt-l mt-4">
            <span class="txt-red">Drivethru</span> is providing admission services in both National and International admissions throughout the year. We are offering
            admissions in 175+ National HEC Recognized Universities and Universities from 18+ International Countries. Ourteam is available 24/7, through all the mediums, to process all your admissions.
         </p>
      </div>
      <div class="col half">
         <img src="{{asset('/images/blog/1.png')}}" alt="">
      </div>
   </div>

   <div class="title red-underline my-5">Blog</div>
   <!-- find uni blog -->
   <div class="row blog mt-5">
      <div class="col  half txt-j">
         <h3>FIND UNIVERSITY</h3>
         <p class="txt-j mt-4">
            The dynamic environment of an emerging country like Pakistan, students face multiple challenges while selecting their majors and thrust areas for further studying. Students of Pakistan have been struggling with decision making, and this leads to poor decisions for their further studies. Many students regret their degree selection after a year or two in the field, many students tend to change their discipline afterwards. Students are also un-aware of the number of programs offered by
            number of universities inside and out of Pa-kistan. Drive Thru aims to tackle all of these problems, in order to make perfect decision making for students possible, Drive Thru will help students in determining their own road map which is better for everyone. Our mission is to satisfy the needs that all high school students in Pakistan have for quali-ty Information Technology (IT) services for Online educational consultancy, in a way that is consistent with our values of excellence,
            efficiency, effectiveness and attention to de-tails. For National Admissions, Student can come to our website and select the degree pro-gram of his/her choice. All the Universities in Pakistan offering that specific degree pro-gram will appear and student can choose any of them by looking at the details of the In-stitute including location, deadline, fee structure etc. Student can also filter the Universi-ties by choosing the desired fee structure or by choosing the preferable
            location. Facility of entering the University name and extracting all information regarding the University is also available. In case of International Admissions, student have to select the country he/she wants to go for study and all the on-board Universities along with their details will show up. Stu-dent can get Information about the Visa process, living cost of that country, study cost, job or work opportunities, Scholarships etc.
         </p>
      </div>
      <div class="col half centered">
         <img src="{{asset('/images/blog/2.png')}}" alt="">
      </div>
   </div>
   <!-- personalized report blog -->
   <div class="row blog mt-5">
      <div class="col half centered">
         <img src="{{asset('/images/blog/3.png')}}" alt="">
      </div>
      <div class="col half txt-j">
         <h3>PERSONALIZED REPORT</h3>
         <p class="txt-j mt-4">
            The dynamic environment of an emerging country like Pakistan, students face multiple challenges while selecting their majors and thrust areas for further studying. Students of Pakistan have been struggling with decision making, and this leads to poor decisions for their further studies. Many students regret their degree selection after a year or two in the field, many students tend to change their discipline afterwards. Students are also un-aware of the number of programs offered by
            number of universities inside and out of Pa-kistan. Drive Thru aims to tackle all of these problems, in order to make perfect decision making for students possible, Drive Thru will help students in determining their own road map which is better for everyone. Our mission is to satisfy the needs that all high school students in Pakistan have for quali-ty Information Technology (IT) services for Online educational consultancy, in a way that is consistent with our values of excellence,
            efficiency, effectiveness and attention to de-tails. For National Admissions, Student can come to our website and select the degree pro-gram of his/her choice. All the Universities in Pakistan offering that specific degree pro-gram will appear and student can choose any of them by looking at the details of the In-stitute including location, deadline, fee structure etc. Student can also filter the Universi-ties by choosing the desired fee structure or by choosing the preferable
            location. Facility of entering the University name and extracting all information regarding the University is also available. In case of International Admissions, student have to select the country he/she wants to go for study and all the on-board Universities along with their details will show up. Stu-dent can get Information about the Visa process, living cost of that country, study cost, job or work opportunities, Scholarships etc.
         </p>
      </div>
   </div>
   <!-- past papers blog -->
   <div class="row blog mt-5">
      <div class="col half txt-j">
         <h3>PAST PAPERS</h3>
         <p class="txt-j mt-4">
            Unfortunately, in Pakistan there is no platform which is providing clear, accurate, easily accessible, updated and timely information about universities, their criterion, programs they are offering and their respective enrollment dates and most Importantly the con-tent about the Entrance exams. Drivethru has resolved this problem of students in an effective and efficient manner by placing all the available past papers of almost every field on its website. <br>
            Few of the them are listed below:<br>
         <ul>
            <li>GAT (General, A, B,C,D)</li>
            <li>MCAT</li>
            <li>NAT (Medical, Engineering, Computer Science)</li>
            <li>ECAT</li>
            <li>NET</li>
         </ul>
         All other Universities past papers are also available on the website in the section of past papers. Students can have easy, free and fast access to this content and can easily win in this game of entrance exam. In most of the Universities, 25-50% paper is repeated from the last five years entrance exams so this feature is heavenly beneficial for the student. For International admissions, past
         papers are also available which includes: <br>
         <ul>
            <li>GMAT</li>
            <li>GRE</li>
            <li>IELTS</li>
            <li>TOEFL</li>
         </ul>

         </p>
      </div>
      <div class="col half centered">
         <img src="{{asset('/images/blog/4.png')}}" alt="">
      </div>
   </div>
   <!-- Apply through us blog -->
   <div class="row blog mt-5">
      <div class="col half centered">
         <img src="{{asset('/images/blog/3.png')}}" alt="">
      </div>
      <div class="col half txt-j">
         <h3>APPLY THROUGH US</h3>
         <p class="txt-j mt-4">
            Another problem they face is the complex, time consuming and lengthy admission Forms they have to fill for every university they are considering to apply for. And for the students who are looking to study abroad in renowned international universities may have to pay multiple visits to their consultants for their counselling and application processing which is very difficult in some situations.
         </p>
         <p class="mt-1">
            Drivethru has solved this problem of the students efficiently by introducing the facility of a unified application form on which the student enters the following details:
         </p>
         <ul>
            <li>Personal Details</li>
            <li>Education details</li>
            <li>Work details</li>
            <li>Admission details (where to apply)</li>
            <li>More documents may be asked (in case of need)</li>

         </ul>
         <p class="mt-1">
            By using this data, Drivethru will apply on the student’s behalf in all the Universities which student will select. Drivethru will take care of all the formalities that are required for admission and will provide the best possible ease and comfort to their students.
         </p>
         <p class="mt-1">
            For International admission, the case is very same. Student just need to select the Country, University and program they want to apply in from the website. Drivethru will carry the complete admission process for them, admission letter, Visa processing and their receiving at the airport in the host country, too. There are no charges made for this whole process except the one which are used in the process.

         </p>
      </div>
   </div>

   <!-- Career Counselling -->
   <div class="row blog mt-5">
      <div class="col half txt-j">
         <h3>CAREER COUNSELLING</h3>
         <p class="txt-j mt-4">
            We close-loop your journey starting from discovering your options to demonstrating your interest. This helps you hone your innovation skills, creativity and build expertise in your desired career field.
         </p>
         <p>
            In order to provide students a vibrant environment to find the best university which matches their interests, prior education, and budget, we help. Our counselors and platform provide them the updated knowledge of the deadlines at Domestic and International universities.
         </p>
         <p>
            In case of international admissions, as you complete your undergraduate degree from a local university or in many cases well before it ends, or even in case of Undergraduate degree after intermediate, you may have evaluated questions regarding the next degree. We have helped candidates from across Pakistan secure top offers across Engineering, Sciences, Management, Social Sciences, Environment, Law, Public Policy, Administration, Fashion, Fine Art and Architecture in USA, Canada, UK,
            Europe, East Asia and Australia. We also work on scholarship applications like Chevening, Fulbright and Erasmus Mundus and grants or fellowships from universities
         </p>
      </div>
      <div class="col half centered">
         <img src="{{asset('/images/blog/3.png')}}" alt="">
      </div>
   </div>
   <!-- Services blog -->
   <div class="row blog mt-5">
      <div class="col half centered">
         <img src="{{asset('/images/blog/3.png')}}" alt="">
      </div>
      <div class="col half txt-j">
         <h3>OUR SERVICES</h3>
         <h4 class="mt-4">Find University</h4>
         <p class="txt-j mt-2">
            Inter-mediate students face issues, regarding decision making about their future scope of studies, and which university should they go to continue their education. To make a clear decision, the student must have insights about the potential universities that he/she is considering to choose for admission. Drivethru provides them with complete information of 175+ National Universities and 18+ International countries for their higher education.
         </p>
         <h4 class="mt-4">Past Papers</h4>
         <p class="txt-j mt-2">
            Students face difficulty in admission to Universities majorly in the Entrance exam of the Universities. Entrance exams are tricky, competitive and conceptual. Past papers can be the best help in this regard as they provide a clear idea that what kind of questions will be in the exam.
         </p>

         <h4 class="mt-4">Apply Through Us</h4>
         <p class="txt-j mt-2">
            Long, Time consuming and complex admission forms are a bitter jump students make due to which they do not take interest in applying to a bunch of Universities which eventually makes the lose many opportunities. Drivethru has introduced a unified application form through which student can apply to as many universities as they want by filling a single form.
         </p>

         <h4 class="mt-4">Career Counselling</h4>
         <p class="txt-j mt-2">
            With less insight about the universities and without a proper career counseling, students may take wrong decisions and end-up in a place where they shouldn’t be. There whole career gets damaged due to lack of proper and right counselling at the right time. Drivethru Counsellors are available 24/7 for the students to let them know what is best suitable option for them.
         </p>

         <h4 class="mt-4">Personalized Report</h4>
         <p class="txt-j mt-2">
            Students face difficulty in admission to Universities majorly in the Entrance exam of the Universities. Entrance exams are tricky, competitive and conceptual. Past papers can be the best help in this regard as they provide a clear idea that what kind of questions will be in the exam.
         </p>

         <h4 class="mt-4">$1/University</h4>
         <p class="txt-j mt-2">
            We do not charge anything for the providing Information. We only charge only $1 ($1= 150/-) per university for the applying process. There are no hidden charges included.
         </p>
      </div>
   </div>
   <!-- FAQ -->
   <div class="row blog mt-5">
      <div class="col txt-j">
         <h3>FREQUENTLY ASKED QUESTIONS</h3>
         <h4 class="mt-4">1. What is Drivethru.pk?</h4>
         <p class="txt-j mt-2">
            Drivethru.pk is first of its kind, an ed-tech firm that is working to meet the higher educational requirements of students of Pakistan. We are providing unparalleled academic excellence in case of both National and International admissions. Drivethru.pk provides students with a unified application form using which we apply on student’s behalf to as many Universities as student wants.
         </p>
         <h4 class="mt-4">2. What differentiates Drivethru.pk from other Educational Consultants?</h4>
         <p class="txt-j mt-2">
            Students with different educational background approach Drivethru.pk and we entertain them efficiently due to bunch of competitive and energetic professional in our team who have vast experience in the field of Educational Consultancy. Our student advisors collaborate with each other and assess the Universities according to the student’s interest and benefits.
         </p>

         <h4 class="mt-4">3. What services do you provide?</h4>
         <p class="txt-j mt-2">
            Drivethru provides information about 175+ National HEC Recognized Universities and International Universities from 17+ countries, for FREE. We let you know about their eligibility criteria, offered programs, Fee structure, Entrance tests, past papers and complete counselling. For International Universities, we provide you information about Visa process, Costs, Top programs of that country, Scholarships and much more, for FREE. You can also apply through us to as many Universities as
            you want at amazingly lower cost of $1/University.
         </p>

         <h4 class="mt-4">4. How much do you charge?</h4>
         <p class="txt-j mt-2">
            We provide complete information about National and International admissions, FREE OF COST. If you want us to apply on your behalf in these Universities, then we charge $1/ University ($1=150 pkr). (Note: We charge no consultancy fee. In case of International admissions, application fee is required by the respective University.)
         </p>

         <h4 class="mt-4">5. How can I book an appointment?</h4>
         <p class="txt-j mt-2">
            You can reach us via WhatsApp in office timing 9:00 A.M-5:00 P.M at following Contact Number.
         </p>
         <h5 class="my-1">+92 316 4515249</h5>
         </p>
         <p>Further, you can leave your message at our Facebook and Instagram. Our team is available for you 24/7 on mentioned sites. We would really love to entertain your concerns.</p>
         <h4 class="mt-4">$1/University</h4>
         <p class="txt-j mt-2">
            We do not charge anything for the providing Information. We only charge only $1 ($1= 150/-) per university for the applying process. There are no hidden charges included.
         </p>
         <h4 class="mt-4">6. Is there any Scholarship available?</h4>
         <p class="txt-j mt-2">
            Yes, Scholarships are available for both National & International Universities. You can easily find them by following us on our Social Media Platforms where they are uploaded on daily basis. You can check out previous scholarships in our Instagram highlights and on Scholarship page of our website.
         </p>

         <h4 class="mt-4">7. Where can I get this Information?</h4>
         <p class="txt-j mt-2">
            You can contact our Student Advisor on mentioned WhatsApp Number in office timings to get complete Information about National or International admissions. You can also book an appointment for an online session with our International Student Advisor.
         </p>
         <h5 class="my-1">+92 316 4515249</h5>

         <h4 class="mt-4">8. When are students admitted by International Universities?</h4>
         <p class="txt-j mt-2">
            Number of Intakes vary from country to country. However, there are 2 major Intakes, Fall Intake (Aug-Sep) and Spring Intake (Jan-Feb). Other Intakes are Summer or Winter.
         </p>
         <h4 class="mt-4">9. Is the application process same for each country?</h4>
         <p class="txt-j mt-2">
            No, Its different for each country and University. Drivethru.pk provides a Unified application form by which you get free from the hassle of different application processes. You can just fill one form and apply to as many countries as you want.
         </p>
         <h4 class="mt-4">10. Can International students’ do part-time work/job while studying abroad?</h4>
         <p class="txt-j mt-2">
            Yes, they can-do part-time job to meet their needs. However, policy for this is different for each country.
         </p>

      </div>
   </div>


</section>
@endsection
@section('footer')
<section class="footer">
   <x-index.footer></x-index.footer>
</section>
@endsection