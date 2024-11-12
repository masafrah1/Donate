
@extends('front-layout.layout')
@section('title', 'أمل المستقبل')
@section('content')


        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">

            <!-- Header Start -->
            <div class="container-fluid bg-breadcrumb">
                <!-- Background Image -->
                <img src="{{ asset('images/about.jpeg') }}" alt="Background" class="bg-breadcrumb-img">

                <!-- Gradient Overlay -->
                <div class="bg-breadcrumb-overlay"></div>

                <!-- Breadcrumb Content -->
                <div class="container text-center py-5 bg-breadcrumb-content" style="max-width: 900px;">
                    <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">برنامج أمل المستقبل</h4>
                    <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <li class="breadcrumb-item active text-white">برنامج امل المستقبل</li>
                        <li class="breadcrumb-item text-white"><a href="/">الرئيسة</a></li>
                    </ol>
                </div>
            </div>

        <!-- Navbar & Hero End -->


        <!-- Abvout Start -->
        <div class="container-fluid about py-5 rtl">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                        <div>
                            <h4 class="text-primary">برنامج أمل المستقبل</h4>
                            <h1 class="display-5 mb-4">حول برنامج أمل المستقبل</h1>
                            <p class="mb-4 p-about-us">
                                برنامج "أمل المستقبل" هو رؤية طموحة تسعى وزارة التنمية الاجتماعية من خلالها إلى تغيير واقع الأيتام في فلسطين وتحويلهم من حالة الاحتياج إلى قوة فاعلة في المجتمع، في ظل الظروف الصعبة التي يعايشها الأيتام، خصوصًا في قطاع غزة الذي شهد ارتفاعاً كبيراً بأعداد الأيتام نتيجة العدوان على القطاع، ويقدم البرنامج حلاً متكاملاً يجمع بين المساعدات الطارئة والمشاريع التنموية طويلة الأمد.
                            </p>
                            <p class="mb-4 p-about-us">
                                يستهدف البرنامج الأيتام من خلال مجموعة من المبادرات الحيوية التي تشمل **الكفالات المالية** الشهرية التي تكفل للأيتام احتياجاتهم الأساسية من مأكل وملبس وتعليم، إضافة إلى **خدمات الرعاية والإيواء** التي توفر مأوى آمن وملائم في مراكز الإيواء المتخصصة. كما يوفر البرنامج **التأمين الطبي** لضمان حصول الأيتام على العلاج والرعاية الصحية، بما في ذلك التنسيق لإجلاء الجرحى من الأطفال الأيتام لتلقي العلاج في الخارج.
                            </p>
                            <p class="mb-4 p-about-us">
                                واحدة من أهم جوانب البرنامج هي **الدعم النفسي والاجتماعي**، حيث يتم العمل على مساعدة الأيتام على التغلب على الآثار النفسية والاجتماعية الناتجة عن فقدان أحد الوالدين أو كليهما، من خلال جلسات دعم نفسي وورش عمل لتأهيلهم. كما لا يقتصر الدعم على الاحتياجات اليومية فقط، بل يشمل **المساعدات الغذائية والصحية** التي تقدم للأيتام وعائلاتهم عبر شحنات مساعدات غذائية وصحية توزع بشكل دوري، إضافة إلى توزيع المعونات الموسمية مثل أضاحي العيد وكسوة الشتاء.
                            </p>
                            <p class="mb-4 p-about-us">
                                برنامج "أمل المستقبل" لا يقتصر على تقديم المساعدات العاجلة فقط، بل يعمل على **إعداد الأيتام للمستقبل** وتحويلهم من حالة الاحتياج إلى الإنتاج والمساهمة الفعالة في المجتمع. من خلال مشاريع تنموية طويلة الأمد، يسعى البرنامج إلى تأهيل الأيتام وتمكينهم من بناء مستقبل أفضل. البرنامج يركز على تطوير مهارات الأيتام وتعليمهم وتحفيزهم على الانخراط في مجالات مختلفة، بما يضمن لهم حياة كريمة ومجتمعًا يستطيعون الإسهام في تطويره.
                            </p>
                            <p class="mb-4 p-about-us">
                                إضافة إلى ذلك، يضمن **تكاملية الخدمات** التي تقدمها الوزارة بالتعاون مع مختلف الشركاء المحليين والدوليين، مما يجعل برنامج "أمل المستقبل" نموذجًا متكاملًا للرعاية الاجتماعية، يتناغم مع الحقوق الإنسانية ويعزز مبدأ العدالة الاجتماعية. من خلال هذه الجهود المشتركة، يطمح البرنامج إلى تحقيق **أهداف طويلة الأمد** تتمثل في توفير حياة كريمة وآمنة لجميع الأيتام، وتحويلهم إلى أفراد منتجين وفاعلين يساهمون في بناء وطنهم.
                            </p>
                        </div>
                    </div>

                    <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="bg-primary rounded position-relative overflow-hidden">
                            <img src="{{ asset('images/about-1.jpeg') }}" class="img-fluid rounded w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
    @endsection
