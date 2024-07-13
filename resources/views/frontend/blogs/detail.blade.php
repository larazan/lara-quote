@extends('frontend.layout')

@push('meta')
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $article->meta_description }}">
<meta name="keywords" content="{{ $article->keyword }}">
@endpush

@section('content')

<div class="flex flex-col bg-white min-h-screen pt-16 md:pt-[80px]">


  <div class="bg-purple-100 py-10 mb-4">
    <div class="flex flex-1 px-4 max-w-3xl m-auto items-center justify-between pt-0 mb-2">
      <a href="{{ url('/articles') }}" class="items-center text-base text-gray-900 hover:underline flex">
        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">
          <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"></path>
        </svg> <span class="text-gray-900 ml-1 hover:text-gray-900">Back to articles</span>
      </a>
    </div>
    <h1 class="relative mx-3 md:mx-auto text-2xl md:text-5xl md:leading-[60px] max-w-3xl m-auto text-black font-semibold text-center mt-4 sm:mt-6 mb-5 sm:mb-0">
      {{ $article->title }}
    </h1>
    <a href="" class="flex items-center justify-center sm:hidden">
      <div>
        <div class="border-white rounded-full border-3 w-10 h-10 roundedShadow">
          <img src="{{ Avatar::create($article->user->first_name.' '.$article->user->last_name)->toBase64() }}" alt="{{ $article->user->first_name }} {{ $article->user->last_name }}" aria-hidden="true" class="rounded-full w-full border-2 border-white" />
        </div>
      </div>
      <p class="text-sm font-semibold text-[#404040] ml-2">
      {{ $article->user->first_name }} {{ $article->user->last_name }}
      </p>
    </a>
    <div class="mt-4 sm:mt-6 text-center text-[#565656] flex justify-center items-center sm:divide-x relative sm:space-x-3 divide-[#CACACA]">
      <a href="https://nowandme.com/blog/author/annanyachaturvedi" class="items-center justify-center hidden font-medium sm:flex">
        <div>
          <div class="border-white rounded-full border-3 hidden text-[20px] leading-9 text-center w-11 h-11 left-11 -top-6 roundedShadow sm:block border-1.5 ">
            <img  src="{{ Avatar::create($article->user->first_name.' '.$article->user->last_name)->toBase64() }}" alt="{{ $article->user->first_name }} {{ $article->user->last_name }}" aria-hidden="true" class="rounded-full w-full border-2 border-white" />
          </div>
        </div>
        <p class="text-sm font-semibold text-[#404040] sm:ml-5 hidden sm:block">
          {{ $article->user->first_name }} {{ $article->user->last_name }}
        </p>
      </a>
      <div class="flex items-center pl-0 sm:pl-3 border-r pr-3 sm:pr-0 border-[#CACACA]">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0_238_253)">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.08333 0.666626C6.08333 0.252412 5.74754 -0.083374 5.33333 -0.083374C4.91912 -0.083374 4.58333 0.252412 4.58333 0.666626V1.1679C2.39564 2.1441 0.827616 4.24638 0.609016 6.74499C0.5833 7.03892 0.583311 7.37848 0.583329 7.95321L0.58333 7.99996L0.583329 8.04671C0.583311 8.62144 0.5833 8.961 0.609016 9.25493C0.894515 12.5182 3.48176 15.1054 6.74503 15.3909C7.03896 15.4167 7.37853 15.4166 7.95327 15.4166L8 15.4166L8.04673 15.4166C8.62147 15.4166 8.96103 15.4167 9.25497 15.3909C12.5182 15.1054 15.1055 12.5182 15.391 9.25493C15.4167 8.96099 15.4167 8.62143 15.4167 8.04669V7.99996V7.95323C15.4167 7.37849 15.4167 7.03892 15.391 6.74499C15.1724 4.24638 13.6043 2.1441 11.4167 1.1679V0.666626C11.4167 0.252412 11.0809 -0.083374 10.6667 -0.083374C10.2524 -0.083374 9.91666 0.252412 9.91666 0.666626V0.69974C9.69963 0.658998 9.47889 0.628569 9.25497 0.608979C8.96104 0.583263 8.62148 0.583274 8.04675 0.583292L8 0.583293L7.95325 0.583292C7.37852 0.583274 7.03896 0.583263 6.74503 0.608979C6.5211 0.628569 6.30036 0.658998 6.08333 0.69974V0.666626ZM9.91666 2.66663V2.23383C9.65952 2.17098 9.39487 2.12695 9.12423 2.10327C8.90411 2.08401 8.63494 2.08329 8 2.08329C7.36505 2.08329 7.09589 2.08401 6.87576 2.10327C6.60513 2.12695 6.34047 2.17098 6.08333 2.23383V2.66663C6.08333 3.08084 5.74754 3.41663 5.33333 3.41663C4.98139 3.41663 4.68606 3.17421 4.60522 2.84725C3.21603 3.69303 2.25298 5.16494 2.10331 6.87572C2.08405 7.09585 2.08333 7.36502 2.08333 7.99996C2.08333 8.6349 2.08405 8.90407 2.10331 9.12419C2.32536 11.6623 4.33767 13.6746 6.87576 13.8966C7.09589 13.9159 7.36505 13.9166 8 13.9166C8.63494 13.9166 8.90411 13.9159 9.12423 13.8966C11.6623 13.6746 13.6746 11.6623 13.8967 9.12419C13.9159 8.90407 13.9167 8.6349 13.9167 7.99996C13.9167 7.36502 13.9159 7.09585 13.8967 6.87572C13.747 5.16493 12.784 3.69303 11.3948 2.84724C11.3139 3.17421 11.0186 3.41663 10.6667 3.41663C10.2524 3.41663 9.91666 3.08084 9.91666 2.66663ZM4.66666 4.58329C4.25245 4.58329 3.91666 4.91908 3.91666 5.33329C3.91666 5.74751 4.25245 6.08329 4.66666 6.08329H11.3333C11.7475 6.08329 12.0833 5.74751 12.0833 5.33329C12.0833 4.91908 11.7475 4.58329 11.3333 4.58329H4.66666ZM6 8.66663C6 9.03481 5.70152 9.33329 5.33333 9.33329C4.96514 9.33329 4.66666 9.03481 4.66666 8.66663C4.66666 8.29844 4.96514 7.99996 5.33333 7.99996C5.70152 7.99996 6 8.29844 6 8.66663ZM5.33333 12C5.70152 12 6 11.7015 6 11.3333C6 10.9651 5.70152 10.6666 5.33333 10.6666C4.96514 10.6666 4.66666 10.9651 4.66666 11.3333C4.66666 11.7015 4.96514 12 5.33333 12ZM8.66666 11.3333C8.66666 11.7015 8.36819 12 8 12C7.63181 12 7.33333 11.7015 7.33333 11.3333C7.33333 10.9651 7.63181 10.6666 8 10.6666C8.36819 10.6666 8.66666 10.9651 8.66666 11.3333ZM10.6667 12C11.0349 12 11.3333 11.7015 11.3333 11.3333C11.3333 10.9651 11.0349 10.6666 10.6667 10.6666C10.2985 10.6666 10 10.9651 10 11.3333C10 11.7015 10.2985 12 10.6667 12ZM8.66666 8.66663C8.66666 9.03481 8.36819 9.33329 8 9.33329C7.63181 9.33329 7.33333 9.03481 7.33333 8.66663C7.33333 8.29844 7.63181 7.99996 8 7.99996C8.36819 7.99996 8.66666 8.29844 8.66666 8.66663ZM10.6667 9.33329C11.0349 9.33329 11.3333 9.03481 11.3333 8.66663C11.3333 8.29844 11.0349 7.99996 10.6667 7.99996C10.2985 7.99996 10 8.29844 10 8.66663C10 9.03481 10.2985 9.33329 10.6667 9.33329Z" fill="#22272F"></path>
          </g>
          <defs>
            <clipPath id="clip0_238_253">
              <rect width="16" height="16" fill="white"></rect>
            </clipPath>
          </defs>
        </svg>
        <p class="text-xs text-[#404040] leading-5 pl-2">
        {{ $article->created_at->diffForHumans() }}
        </p>
      </div>
      <div class="flex items-center pl-3">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M8.00001 0.583374C3.9039 0.583374 0.583344 3.90393 0.583344 8.00004C0.583344 12.0962 3.9039 15.4167 8.00001 15.4167C12.0961 15.4167 15.4167 12.0962 15.4167 8.00004C15.4167 3.90393 12.0961 0.583374 8.00001 0.583374ZM2.08334 8.00004C2.08334 4.73236 4.73233 2.08337 8.00001 2.08337C11.2677 2.08337 13.9167 4.73236 13.9167 8.00004C13.9167 11.2677 11.2677 13.9167 8.00001 13.9167C4.73233 13.9167 2.08334 11.2677 2.08334 8.00004ZM8.75001 5.33337C8.75001 4.91916 8.41422 4.58337 8.00001 4.58337C7.5858 4.58337 7.25001 4.91916 7.25001 5.33337V8.00004C7.25001 8.2508 7.37533 8.48498 7.58398 8.62408L9.58398 9.95741C9.92863 10.1872 10.3943 10.094 10.624 9.7494C10.8538 9.40475 10.7607 8.9391 10.416 8.70934L8.75001 7.59865V5.33337Z" fill="#404040"></path>
        </svg>
        <p class="text-xs text-[#404040] leading-5 pl-2">{{ $article->readTime() }} min read</p>
      </div>
    </div>
  </div>

  <div class="flex flex-row w-full">
    <div class="flex flex-1 flex-col items-center justify-center relative">
      <div class="flex flex-1 flex-col pb-18 max-w-md md:max-w-2xl ">
        <section class="w-full mx-auto  mt-2 md:mt-4 px-5 markdown-blog">
          <article>
            <p>
              <a href="https://m.thewire.in/author/Aleesha-Matharu" target="_blank" rel="nofollow">
                Aleesha Matharu
              </a>{" "}
              is the Editor of{" "}
              <a href="https://www.instagram.com/livewirein/?hl=en" target="_blank" rel="nofollow">
                LiveWire
              </a>{" "}
              and Assistant Editor at The Wire. She has previously
              worked for The Indian Express, Catch News and Rock Street
              Journal and is one of the most fun and chill people you’ll
              ever come across. With her witty sarcasm, she sure knows
              how to regale her audience.
            </p>
            <p>
              Read this interview-cum-candid-conversation for a sneak
              peek into her journey, and what Live Wire stands for, in
              heart and mind.
            </p>
            <h2 id="inter">Interview with Aleesha Matharu</h2>
            <h3>
              How much does journalism as a profession resonate with
              you?
            </h3>
            <p>
              I’d like to trace back the beginning of my journalism
              journey to my boarding school “Wellham Girls” where I
              ended up being the editor of four magazines, including{" "}
              <em>The News &amp; Views</em>. I went on pursuing
              B.A.(Hons.) English from Delhi University. Post that, I
              enrolled in a course by <em>The Indian Express</em> for a
              year, which was more in flux, as far as my futuristic
              plans including whether to pursue a masters or not were
              concerned. Receiving the title of “Best All-Round Student”
              came as a surprise to me, considering the fact that I was
              a happy 70-80 percenter back in school, where
              <strong>
                I was rather more interested in reading my own books and
                not necessarily chasing the grades.
              </strong>
            </p>
            <p>
              The course served in perfect synonymity with my perception
              of things owing to the fact that I’ve always had a keen
              interest in understanding the worldview around me. I was a
              massive history buff, especially World History. Reading
              about world history, Vietnam War, Korean War, all the
              travel in the middle-east helped me form an opinion of
              what’s happening today because, at the end of the day,
              it’s all interconnected. Things don’t work out until you
              choose your own road.
            </p>
            <blockquote>
              <p>
                In Journalism, you feel that you’re not only giving
                other people a voice but also you’re trying to say the
                right thing and alter the narrative.
              </p>
            </blockquote>
            <h3>What made you choose LiveWire and TheWire?</h3>
            <p>
              I was working at the <em>Catch News</em>, when one of the
              Founding Editors of The Wire, Siddharth Varadarajan
              reached out to me, and it all just worked out. I joined
              The Wire, at a time when LiveWire was just kick-starting.
            </p>
            <p>
              And this one day, Siddharth offers me the post of
              Editor-in-chief for LiveWire. I was a bit dicey about
              student politics because that was not my area of expertise
              but slowly over time, I started making it my own. Here,
              suddenly I was in a position where I had to do all of it -
              from ideation to execution, but finally,{" "}
              <strong>I think I have put my stamp on it.</strong>
            </p>
            <p>
              When I took over, we had 12k followers on Instagram, and
              now, we are over 190k in 1.5 years. I always wanted it to
              grow more organically and democratise the platform in that
              sense. Understanding other’s perspective has always been
              in alignment with my high EQ, ever since I was a kid, and
              LiveWire allowed me to put that into good use.
            </p>
            <h3>
              What is LiveWire’s content creation and publication
              process?
            </h3>
            <p>
              Our inbox is open for anyone and everyone. Right when
              lockdown started, we jumped from getting about 25 emails a
              day to about 80 emails. I spent 3-4 hours with just my
              mailbox. On Monday, I get hit by a brick wall and tell
              myself to breathe. My only other colleague at the editor’s
              desk, Tanya Jha, is the most dependable person I’ve ever
              come across. Our illustrator, Pariplab Chakroborty, brings
              life to a lot of copies.
            </p>
            <blockquote>
              <p>
                The inbox has made me cry, the inbox has made me smile,
                the inbox has made me want to throw away my laptop.
              </p>
            </blockquote>
            <p>
              Many people write to me because they don&apos;t have anyone to
              talk to. But when I read their writings, I find it hard to
              use them because they&apos;re not written well or they&apos;re too
              raw and emotional. Even though I try to give them a
              chance, it&apos;s tough for me to work with those pieces. It&apos;s
              really difficult to reject those pieces and sometimes I
              end up saying things like &quot;things will get better&quot; to
              provide some comfort to them. However, later on, I do feel
              guilty because I don&apos;t feel like I&apos;m actually helping
              them. I believe my job falls into a gray area where it&apos;s
              hard to determine what exactly I should do. But sometimes
              people just need to hear the right words, and I try my
              best to offer them that.
            </p>
            <h3>
              For me, LiveWire has always been reflecting the voice of
              the masses and the reality in a very raw yet relatable
              way, was it a conscious attempt on the part of creators
              and editors, or is it something that gradually developed
              over time?
            </h3>
            <p>
              Absolutely, over time I&apos;ve managed to give its own voice
              to LiveWire. Initially, when I took over, there was an age
              limit of 28 for submitting pieces and I thought that was
              really ageist because anyone could have an interesting
              opinion. A 50-year-old person may have something very
              interesting to say that could resonate with the youth, so
              eventually, the age limit was chucked out and that was
              wonderful because
              <strong>
                we have had teachers, professors, physicists, people
                from outside India writing to us: from all walks of
                life.
              </strong>{" "}
              Recently, a 60-year-old man wrote a couple of poems for
              us. As far as it&apos;s good creative content that resonates
              and works, it&apos;s all that matters.
            </p>
            <p>
              It also serves as a gateway for students to talk to their
              parents. We&apos;ve got young adults writing stories of great
              heartache for us.
              <strong>
                A lot of people go anonymously but a lot of them are
                okay to put their name on it, and I think that&apos;s so
                courageous
              </strong>
              , talking about your family history in ways that people
              can relate to it. Some stories that come out are just
              horrible, teachers bullying kids, kids bullying kids. I
              feel it&apos;s very important to get these voices out there
              because a lot of them don&apos;t understand that they did this
              and that they were perpetrators in school. Even if they
              were not the bully in question, they were allowing for
              this to happen, and we need to keep them in check.
              <em>
                There is too much toxicity in the world: there are
                pitfalls to woke culture, there are pitfalls to cancel
                culture but being nicer to one another is one of the
                easiest things to do.
              </em>
              *
            </p>
            <p>
              Colourist ways in school, fat-shaming: school is not a
              nice place regardless of a system that can be made much
              better. And then, we wouldn’t have to have a platform to
              <a href="https://nowandme.com/blog/empathy-versus-sympathy">
                teach empathy
              </a>
              , teaching to just respect a fellow human being
              irrespective of his race, caste, creed, colour. It’s all
              roses they taught in school, but the real world is not
              that place.
            </p>
            <hr />
            <h3>
              LiveWire doesn&apos;t shy away from calling out those in
              authority and starting important conversations while
              raising uncomfortable questions. It is the sort of woke
              platform that everyone wished for, throughout time, but
              somewhere between the censoring and selling of media
              houses, the idea got lost somewhere. I, personally felt
              that the news or the opinion pieces that I earlier used to
              come across narrated just one side of the story, and so I
              couldn&apos;t resonate with any of it, but your work is an
              epitome of the contrary. What and how do you think
              LiveWire and The Wire has managed to do differently and
              emerge as what it is today?
            </h3>
            <p>
              We&apos;re lucky that with The Wire family, we&apos;re an
              independent media company with no bosses except for the
              three founding editors. We&apos;re 80% donor-funded which means
              that no one is telling us what to do, our readers are
              sending us money. If it&apos;s a story, it&apos;s a story without
              any check, it&apos;s us making the call, that if a particular
              thing needs to be represented and put out. These are
              stories that need to be told and someone has to say it.
              It&apos;s important that someone points it out especially when
              the narrative that&apos;s being sold is very different from the
              actual happenings. So, the independent media houses
              including <em>The Quint</em>, <em>The Scroll</em> and the{" "}
              <em>News Laundry</em>, the <em>News Minute</em> provide
              these alternative spaces.
            </p>
            <p>
              I&apos;d rather read my news, get my facts right from
              legitimate websites than watching television news or
              rather entertainment in form of a sick joke, that has been
              playing on for so long. There is no talk of a pandemic,
              and
              <strong>
                it&apos;s really scary and the fact that they are not
                portraying that sense of urgency on television due to
                which our numbers keep on rising of which we dont have
                the infrastructure for.
              </strong>{" "}
              It’s just so unknown. It’s mind-boggling how far-reaching
              this confusion that people read. And sadly, it’s also a
              result of a flawed education system.
            </p>
            <p>
              <strong>
                We had imagined 2020 to be much progressive, wishing for
                flying cars but it turned out to be filled with hatred
                and bigotry around the world
              </strong>
              , including The United States, crimes against women have
              not stopped when we look at countries like Turkey and
              Brazil.
            </p>
            <blockquote>
              <p>
                Under the guise of the pandemic, we don’t even know
                what’s happening all around the world because there is
                just so much news that who is going to seek out that
                extra human rights violation in that corner of the
                world, especially when the world didn’t begin to care
                about it, in the first place so, it’s really
                heartbreaking.
              </p>
            </blockquote>
            <p>
              In the entire Sushant Singh Rajput case,{" "}
              <strong>
                I’m shocked at the insensitivity and unawareness of the
                media channels where they called mental health a
                “disease”.
              </strong>{" "}
              Policing a woman for smoking a cigarette or wearing a
              short skirt needs to be changed because it’s 2020 already.
              I’m 30 years old but still, people in my society don’t
              consider me as an adult yet owing to the fact that I’m not
              married. Just stay healthy, mentally and physically, that
              is all that matters. Spend time with your family. And dont
              forget to wash your hands, of course!
            </p>
            <hr />
            <h3>
              LiveWire as a subset of TheWire, mostly known for its woke
              opinion pieces: How did it come into existence? Was there
              a need to start this branch of the wire that exclusively
              dealt with the thoughts and narrations of the masses?
            </h3>
            <p>
              They wanted to start something that was more youth-focus,
              a platform for people to write their poetry, essays and a
              lot more and I think we have achieved that to a great
              extent.
            </p>
            <p>
              I’m learning and unlearning every day. I may have grown up
              in a very liberal household where I and my sister had our
              fair shares of freedom but despite that, I look around and
              notice my internalised patriarchy. Even though my father
              is an extreme feminist and we almost agree on everything,
              there is always a little something in all men of a certain
              generation
            </p>
            <hr />
            <h3>
              Absolutely agreed! Even patriarchy as an ideology operates
              in very subtle mannerisms, I remember reading an article
              on LiveWire titled “The Ugly Daughter of a Pretty Mother”
              and it just made so much sense. Such pieces help me
              identify something which I never knew could exist, in the
              first place. But it’s very much there in all of us, too
              deeply-ingrained to be aware or conscious of.
            </h3>
            <p>
              So, the other day I came across an exchange between Masaba
              Gupta and her mother where Neena Gupta, in a game of{" "}
              <em>Never Have I Ever</em> asks Masaba that have you ever
              stalked anyone on Instagram and she is like
              <em>“yeah, of course,”</em> and she is like{" "}
              <em>“no, they all stalk me”</em> which shows such
              difference in perspectives and even then, Masaba has a lot
              to overcome, especially in a country like India, where
              people can be extremely racist and uninformed. So, these
              small moments of truth make you go like{" "}
              <em>“Yeah, I know what’s going happening here”</em>.
            </p>
            <hr />
            <h3>
              Who is Aleesha Matharu when she is not a journalist and
              the editor of one of India’s most powerful media houses?
              What do you do in your leisure time, if you get any? Do
              you have any therapeutic outlet?
            </h3>
            <p>
              I recently started watching YouTube. I love to spend time
              with my family and dogs. I’ve also been learning how to DJ
              since past one year, so, I sometimes practice that. And I
              go for a lot of walks which is absolutely cathartic for
              me: getting out of the house for some fresh air. Also,
              there is this feature on the phone which tells you the
              number of hours you’ve spent on an app and shames you on
              your face.
            </p>
            <hr />
            <h3>
              How do you deal with hatred and bigotry? Both on a
              personal and professional level, do you turn a blind eye
              towards them because they are not worth your time and
              energy, or do you call them out and educate them? Because
              when you try to question the norm, people usually don’t
              take it very well, considering we’re wired to think and
              behave in a certain way.
            </h3>
            <p>
              Sometimes, I avoid the comments section, because sometimes
              I just dont want to deal with it, when I fell that this is
              not something I can take on mentally. There are other days
              when I’m ready, I go for it hear-on. It is also scary
              sometimes, given the hate and bashing that comes to our
              inboxes. I also try not replying to any messages at least
              one day a week. Like a whole shutdown, day experimenting
              with cooking, going to the supermarket, taking that one
              extra bath and leisurely shower at least one day a week.{" "}
              <strong>
                Self-care doesn’t solve problems but it certainly helps
                feel you good, in some ways.
              </strong>{" "}
              Post lockdown, we all have a skincare routine which we
              actually follow.
            </p>
            <p>
              But there is also a lot of appreciation and support as
              well, from various individuals saying that
              <strong>
                we come to your platform, learn something new and take
                it home with us. It’s fine if you cannot agree with
                certain posts but as long as something else is
                resonating with you, I’ sure that empathy is stringing
                around somewhere.
              </strong>
            </p>
            <hr />
            <h3>
              Now&amp;Me is a peer to peer community support network
              which helps young people feel less lonely during difficult
              times and allows them to connect with others who might
              have been through similar things like them from all across
              the world. According to you, how impactful are positive
              spaces like Now&amp;Me, for our youth?
            </h3>
            <p>
              It’s a great platform that I’ve begun to realise with
              reading so many stories that come into the LiveWire inbox
              that{" "}
              <strong>
                there are so many experiences that are so similar yet so
                dissimilar
              </strong>{" "}
              that if you’ve more number of such stories out there,
              there’s a chance that there is someone out there who
              doesn’t feel so alone in thinking that they are the only
              person who is going through this at a current time. It’s
              nice to know that there is someone out there who is
              literally going through the same thing as you.
            </p>
            <p>
              So, if you have a platform which is created to lay bare
              your true self, where other
              <strong>
                people are not going to judge you because they are all
                trying to be vulnerable and vulnerability is not easy,
                it takes courage.
              </strong>{" "}
              Just owning whatever you want to say and express. And the
              same goes for LiveWire as well. It has been working itself
              out so organically, I love watching it grow, it has been a
              wonderful journey!
            </p>
            <hr />
            <p>
              <em>
                Interviewed, Transcribed and Edited by{" "}
                <a href="https://nowandme.com/user/annanyachaturvedi">
                  Annanya Chaturvedi
                </a>
              </em>
            </p>
            <hr />
            <p>
              <em>
                The views and opinions expressed in this article are
                solely those of the author and guest and do not
                necessarily reflect the official policy, position or
                beliefs of Now&amp;Me, any other agency, organization,
                employer or company. And since we are
                critically-thinking human beings, these views are always
                subject to change, revision, and rethinking at any time.
                Please do not hold us to them in perpetuity.
              </em>
            </p>
          </article>
        </section>

      </div>

    </div>
  </div>
</div>

<x-article-list :articles="$articles" />

<livewire:comments :model="$article"/>

<livewire:newsletter-form />

@endsection