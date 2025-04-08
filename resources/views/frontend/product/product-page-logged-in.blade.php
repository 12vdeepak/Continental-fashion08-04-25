@extends('frontend.layouts.app')
@section('content')
    <main>

        <!-- ------------------- Page nav show ------------- -->
        <div id="pageNavShow " class="flex items-center bg-[#F4F4F4] gap-4 py-4 px-4 lg:px-[120px] ">
          <div class="backIcon">
            <img src="{{ asset('frontend/assets/images/backIcon.svg') }}" alt="">
          </div>
          <div class="homeIcon flex gap-2 items-center font-[500] text-[#6E6E6E] text-[16px]">
            <img src="{{ asset('frontend/assets/images/HomeIcon.svg') }}" alt=""> Home
          </div>
          <div class="line">
            <img src="{{ asset('frontend/assets/images/Line.svg') }}" alt="">
          </div>
          <div class="currentPage text-[#6E6E6E] font-[500] text-[16px] flex items-center gap-2">
            All Products
            <img src="{{ asset('frontend/assets/images/forwardIcon.svg') }}" alt="">
            <span class="text-[#E2001A]">
              Cotton Bag
            </span>
          </div>
      
        </div>
      
        <!--Cancellation Page Content -->
        <section id="productPage" class="flex flex-col lg:flex-row gap-20  px-4 lg:px-[120px] py-[80px] ">
      
          <!-- Container -->
          <!-- Container -->
          <!-- Container -->
          <div class="w-full lg:w-[50%] bg-white">
      
            <!-- Product Display -->
            <div class="flex flex-col flex-col-reverse gap-10 md:gap-0 md:flex-row md:space-x-8">
      
              <!-- Thumbnails (Left) -->
              <div class=" md:flex flex md:flex-col  items-center gap-2 ">
                <div class="border-2 border-red-500 rounded p-1">
                  <img src="{{ asset('frontend/assets/images/blueHoodie.png') }}" alt="Blue Hoodie" class="w-16 h-16 object-cover" />
                </div>
                <div class="border border-gray-200 rounded p-1">
                  <img src="{{ asset('frontend/assets/images/blueHoodie.png') }}" alt="White Hoodie" class="w-16 h-16 object-cover" />
                </div>
                <div class="border border-gray-200 rounded p-1">
                  <img src="{{ asset('frontend/assets/images/blueHoodie.png') }}" alt="Black Hoodie" class="w-16 h-16 object-cover" />
                </div>
                <div class="border border-gray-200 rounded p-1">
                  <img src="{{ asset('frontend/assets/images/blueHoodie.png') }}" alt="Yellow Hoodie" class="w-16 h-16 object-cover" />
                </div>
                <div class="border border-gray-200 rounded p-1">
                  <img src="{{ asset('frontend/assets/images/blueHoodie.png') }}" alt="Yellow Hoodie" class="w-16 h-16 object-cover" />
                </div>
               
              </div>
      
              <!-- Main Image Container with Arrows & Dots -->
      
              <div class="arrowImageDots flex justify-center items-center   ">
                <div class="leftArrow  rounded-full lg:bg-[#F4F4F4] flex justify-center items-center p-4 h-[48px] w-[48px] ">
                  <img src="{{ asset('frontend/assets/images/productBack.svg') }}" alt="" >
                </div>
                <div class="imageContainerAndDots flex flex-col justify-between items-center">
                  <div class="activeProductImage ">
                    <img src="{{ asset('frontend/assets/images/blueHoodie.png') }}" alt="" class="">
                  </div>
                  <div class="dots mt-4 flex justify-between items-center gap-1">
                    <div class="dot h-2 w-2 bg-[#E2001A] rounded-full"></div>
                    <div class="dot h-2 w-2 bg-[#6E6E6E] rounded-full"></div>
                    <div class="dot h-2 w-2 bg-[#6E6E6E] rounded-full"></div>
                    <div class="dot h-2 w-2 bg-[#6E6E6E] rounded-full"></div>
                    <div class="dot h-2 w-2 bg-[#6E6E6E] rounded-full"></div>
                  </div>
                </div>
                <div class="rightArrow rounded-full lg:bg-[#F4F4F4] flex justify-center items-center p-4 h-[48px] w-[48px] ">
                  <img src="{{ asset('frontend/assets/images/productArrowAhead.svg') }}" alt="">
                </div>
              </div>
      
      
            </div>
      
            <!-- Colors Options -->
            <div class="mt-6">
              <h3 class="text-lg font-semibold mb-2">Colors options:</h3>
              <div class="flex flex-wrap gap-2">
                <button class="w-8 h-8 rounded-full bg-red-500 ring-2 ring-red-600"></button>
                <button class="w-8 h-8 rounded-full bg-blue-400"></button>
                <button class="w-8 h-8 rounded-full bg-yellow-300"></button>
                <button class="w-8 h-8 rounded-full bg-black"></button>
                <button class="w-8 h-8 rounded-full bg-white border border-gray-300"></button>
              </div>
            </div>
      
            <!-- Size Options -->
            <div class="mt-6">
              <h3 class="text-lg font-semibold mb-2">Size:</h3>
              <div class="flex flex-wrap gap-2">
                <button class="px-4 py-2 border rounded-md hover:bg-gray-100">XS</button>
                <button class="px-4 py-2 border rounded-md hover:bg-gray-100">S</button>
                <button class="px-4 py-2 border rounded-md hover:bg-gray-100">M</button>
                <button class="px-4 py-2 border rounded-md hover:bg-gray-100">L</button>
                <button class="px-4 py-2 border rounded-md hover:bg-gray-100">XL</button>
                <button class="px-4 py-2 border rounded-md hover:bg-gray-100">XXL</button>
                <button class="px-4 py-2 border rounded-md hover:bg-gray-100">XXXL</button>
              </div>
            </div>
      
          </div>
      
      
      
          <div class="productSelection  w-full lg:w-[50%]   flex flex-col  ">
            <div class="category text-[#3CC4D5] text-sm">Shopping Bag</div>
            <div class="productName text-[26px] font-bold mt-2">
              Classic Hodded Sweat
            </div>
            <div class="productCompany">
              By <span class="text-[#E2001A]">Fruit of the loom </span>
            </div>
            <div class="productDetails text-[#6E6E6E] mt-5">
              <div class="productDetailsHeading text-[16px] font-medium   ">Product Details:</div>
              <div class="articleNumber text-[14px] mt-2 ">
                Article number: <span class="text-[#000000]">622080</span>
              </div>
              <div class="GSM text-[14px]">
                GSM: <span class="text-[#000000]">622080</span>
      
              </div>
            </div>
            <div class="combinationAssociated w-full mt-5">
              <div class="associatedHeading text-[16px] text-[#6E6E6E] font-medium">
                Associated Combination Products:
              </div>
              <div class="combButtons flex   gap-2 mt-2">
      
      
                <div class="combButtonOne  ">
                  <button class="flex items-center border border-gray-200 border-solid p-[12px] gap-20 rounded-md ">
                    <div class="iconAndName flex items-center gap-2">
                      <div class="icon">
                        <img src="{{ asset('frontend/assets/images/womenIconCol.svg') }}" alt="">
                      </div>
                      <div class="name text-sm">Women</div>
                    </div>
                    <div class="info">
                      <img src="{{ asset('frontend/assets/images/infoCol.svg') }}" alt="">
                    </div>
      
                  </button>
                </div>
                <div class="combButtonSecond">
                  <button class="flex gap-20 items-center border border-gray-200 border-solid p-[12px] rounded-md ">
                    <div class="iconAndName flex items-center gap-2">
                      <div class="icon">
                        <img src="{{ asset('frontend/assets/images/womenIconCol.svg') }}" alt="">
                      </div>
                      <div class="name text-sm">Women</div>
                    </div>
                    <div class="info">
                      <img src="{{ asset('frontend/assets/images/infoCol.svg') }}" alt="">
                    </div>
      
                  </button>
      
                </div>
              </div>
      
            </div>
            <div class="promotionalInfo mt-5">
              <div class="promotionalHeading text-[16px] text-[#6E6E6E] font-medium">
                Promotional Finishing Information:
              </div>
              <div class="buttonSection flex gap-2 mt-2">
                <div class="button  border border-gray-200 border-solid p-[8px] rounded-md text-sm ">Digital Print</div>
                <div class="button  border border-gray-200 border-solid p-[8px] rounded-md text-sm">Digital Print</div>
                <div class="button  border border-gray-200 border-solid p-[8px] rounded-md text-sm">Digital Print</div>
                <div class="button  border border-gray-200 border-solid p-[8px] rounded-md text-sm">Digital Print</div>
              </div>
            </div>
            <div class="licenseLabel mt-5">
              <div class="labelheading text-[16px] text-[#6E6E6E] font-medium">
                Labels:
              </div>
              <div class="labels flex items-center gap-1 mt-2">
                <img src="{{ asset('frontend/assets/images/topseller.jpeg') }}" alt="" class="h-[60px]">
                <img src="{{ asset('frontend/assets/images/topseller.jpeg') }}" alt="" class="h-[60px]">
              </div>
            </div>
            <div class="mainButton mt-5 flex flex-col">
              <button
                  class="bg-[#F4F4F4] text-[#54114C] text-[16px] font-medium  flex justify-center items-center gap-2   w-full lg:w-[500px] p-4 rounded-xl">Download
                  pricelist to see the price <img src="/assets/images/purpleDownload.svg" alt=""></button>
              <div class="quantityAndCart flex mt-7 justify-between items-center w-full lg:w-[500px]  gap-2">
                  <div class="flex items-center justify-between w-40 bg-gray-100 rounded-xl p-3 w-[50vw] lg:w-[250px]">
                      <button id="decrease" class="text-black text-md px-3">−</button>
                      <span id="counter" class="text-gray-800 font-medium text-md">120</span>
                      <button id="increase" class="text-black text-md px-3">+</button>
                  </div>
                  <a href="/pages/MyCart.html">
                      <button>
                          <div class="flex items-center justify-center w-40 bg-[#54114C] rounded-xl p-3 w-[50vw] lg:w-[250px]">
                              <span class="text-[#ffffff] font-medium text-md">Add to cart</span>
                          </div>
                      </button>
                  </a>
              </div>
            </div>
      
          </div>
      
      
        </section>
        
      
        <section id="productDescriptionAndRest" class=" px-4 lg:px-[120px] py-[80px] bg-[#F4F4F4]">
      
          <div class="descriptionHeading font-bold text-[24px]  ">
            <button class="border-b-3 border-[#E2001A]">
              Description
      
            </button>
            
          </div>
          <div class="productInformation mt-5 font-bold text-[18px]">
            Product Information: <span class=" text-[#3CC4D5] font-medium">Classic hooded sweat</span>
      
          </div>
          <div class="productInfo mt-2 text-[16px] text-[#4A4A4A]">
            <p>
              Double fabric hood, self-colored flat draw cord, front pouch pocket, waist and cuff in cotton/Lycra® rib
            </p>
            <p>
              Material: 80 % cotton, 20 % polyester (heather-colours: 60 % cotton, 40 % polyester)
            </p>
          </div>
      
          <div class="productInfoTable w-full lg:w-[70%] bg-[#E7E6E7] flex flex-col gap-4 p-6 rounded-xl mt-10 border border-dashed border-gray-500 font-medium ">
            <div class="rowOne w-full flex justify-between ">
              <div class="columnOneRowOne text-[#6E6E6E] w-1/2">
                Label:
              </div>
              <div class="columnTwoRowOne w-1/2 ">
                Classic Hooded Sweat
              </div>
            </div>
            <div class="rowOne w-full flex justify-between">
              <div class="columnOneRowOne text-[#6E6E6E] w-1/2">
                Label:
              </div>
              <div class="columnTwoRowOne w-1/2 ">
                Classic Hooded Sweat
              </div>
            </div>
            <div class="rowOne w-full flex justify-between">
              <div class="columnOneRowOne text-[#6E6E6E] w-1/2">
                Label:
              </div>
              <div class="columnTwoRowOne w-1/2 ">
                Classic Hooded Sweat
              </div>
            </div>
            <div class="rowOne w-full flex justify-between">
              <div class="columnOneRowOne text-[#6E6E6E] w-1/2">
                Label:
              </div>
              <div class="columnTwoRowOne w-1/2 ">
                Classic Hooded Sweat
              </div>
            </div>
          </div>
      
          <div class="manufactureInfo mt-7 ">
            <div class="manufactureHeading font-bold text-[18px]">
              Manufacturer Information
            </div>
            <div class="manufacturerDetails font-medium text-[16px] text-[#6E6E6E] mt-2">
              <p>
                FOL International Ltd. <br>
                Unit 6, Lisfannon Business Centre, Lisfannon, Buncrana, County Donegal, Ireland F93Y2NA <br>
                fruitbrands@fotlinc.com
              </p>
            </div>
          </div>
      
        </section>
      
       
        
        
      
        
      
      
      
        <!-- final  -->
        <section id="customerAlsoBought" class=" px-4  lg:px-[120px] py-[80px]">
          <div class="headingAndButtons flex justify-between items-center">
            <h2 class=" headingCus text-2xl lg:text-[48px] font-semibold ">Customers Also Bought</h2>
            <div class="buttons flex gap-4">
              <button id="prevBtn" class=" bg-gray-100 h-[40px] w-[40px] lg:h-[45px] lg:w-[45px] text-white rounded-full flex justify-center items-center">
                <img src="{{ asset('frontend/assets/images/productBack.svg')}}" alt="" class="w-1/2 h-1/2 " >
              </button>
              <button id="nextBtn" class=" bg-gray-100 h-[40px] w-[40px] lg:h-[45px] lg:w-[45px] text-white rounded-full flex justify-center items-center ">
                <img src="{{ asset('frontend/assets/images/forwardArrow.svg')}}" alt="" class="w-1/2 h-1/2 ">
              </button>
            </div>
          </div>
        
          <!-- Carousel Wrapper -->
          <div class="relative mt-10">
            <div
              id="carousel"
              class="flex gap-10 overflow-x-scroll scroll-smooth snap-x snap-mandatory scrollbar-hide"
            >
              <!-- Product 1 -->
             
              <div class=" relative product w-full  md:w-1/2 lg:w-[25vw] flex-shrink-0 snap-start  ">
                <div
                    class="absolute top-5 left-2 bg-sky-500 text-white text-sm font-regular  px-2 text-[12px] lg:px-3 py-1 rounded-md">
                    25% offer
                </div>
                <div class="productImage mb-4  ">
                    <img src="{{ asset('frontend/assets/images/productDemImg.jpeg')}}" alt="" class="rounded-xl">
                </div>
                <div class="productSubIcons mb-3 flex justify-between items-center  ">
                    <div class="productLeft text-[#6E6E6E] ">620020</div>
                    <div class="productIconSet flex justify-between gap-2 items-center">
                        <img src="{{ asset('frontend/assets/images/ma;e.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/female.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/kid.svg')}}" alt="">
      
                    </div>
                </div>
                <div class="productTitle mb-1 text-md font-medium lg:text-xl">Shopping Bags</div>
                <div class="productTag mb-2 text-[#E2001A] text-[12px] ">Fruit of the loom</div>
                <div class="productColors mb-2 ">
                    <div class="flex items-center space-x-2">
                        <div class="relative flex -space-x-3">
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-purple-700 rounded-full border-2 border-white"></div>
                            <div class=" w-6 h-6 lg:w-8 lg:h-8 bg-blue-600 rounded-full border-2 border-white"></div>
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-sky-400 rounded-full border-2 border-white"></div>
                        </div>
                        <span class="text-gray-500 text-sm lg:text-md  font-medium">16+</span>
                    </div>
      
                </div>
            </div>
              <div class=" relative product w-full  md:w-1/2 lg:w-[25vw] flex-shrink-0 snap-start  ">
                <div
                    class="absolute top-5 left-2 bg-sky-500 text-white text-sm font-regular  px-2 text-[12px] lg:px-3 py-1 rounded-md">
                    25% offer
                </div>
                <div class="productImage mb-4  ">
                    <img src="{{ asset('frontend/assets/images/productDemImg.jpeg')}}" alt="" class="rounded-xl">
                </div>
                <div class="productSubIcons mb-3 flex justify-between items-center  ">
                    <div class="productLeft text-[#6E6E6E] ">620020</div>
                    <div class="productIconSet flex justify-between gap-2 items-center">
                        <img src="{{ asset('frontend/assets/images/ma;e.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/female.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/kid.svg')}}" alt="">
      
                    </div>
                </div>
                <div class="productTitle mb-1 text-md font-medium lg:text-xl">Shopping Bags</div>
                <div class="productTag mb-2 text-[#E2001A] text-[12px] ">Fruit of the loom</div>
                <div class="productColors mb-2 ">
                    <div class="flex items-center space-x-2">
                        <div class="relative flex -space-x-3">
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-purple-700 rounded-full border-2 border-white"></div>
                            <div class=" w-6 h-6 lg:w-8 lg:h-8 bg-blue-600 rounded-full border-2 border-white"></div>
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-sky-400 rounded-full border-2 border-white"></div>
                        </div>
                        <span class="text-gray-500 text-sm lg:text-md  font-medium">16+</span>
                    </div>
      
                </div>
            </div>
              <div class=" relative product w-full  md:w-1/2 lg:w-[25vw] flex-shrink-0 snap-start  ">
                <div
                    class="absolute top-5 left-2 bg-sky-500 text-white text-sm font-regular  px-2 text-[12px] lg:px-3 py-1 rounded-md">
                    25% offer
                </div>
                <div class="productImage mb-4  ">
                    <img src="{{ asset('frontend/assets/images/productDemImg.jpeg')}}" alt="" class="rounded-xl">
                </div>
                <div class="productSubIcons mb-3 flex justify-between items-center  ">
                    <div class="productLeft text-[#6E6E6E] ">620020</div>
                    <div class="productIconSet flex justify-between gap-2 items-center">
                        <img src="{{ asset('frontend/assets/images/ma;e.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/female.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/kid.svg')}}" alt="">
      
                    </div>
                </div>
                <div class="productTitle mb-1 text-md font-medium lg:text-xl">Shopping Bags</div>
                <div class="productTag mb-2 text-[#E2001A] text-[12px] ">Fruit of the loom</div>
                <div class="productColors mb-2 ">
                    <div class="flex items-center space-x-2">
                        <div class="relative flex -space-x-3">
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-purple-700 rounded-full border-2 border-white"></div>
                            <div class=" w-6 h-6 lg:w-8 lg:h-8 bg-blue-600 rounded-full border-2 border-white"></div>
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-sky-400 rounded-full border-2 border-white"></div>
                        </div>
                        <span class="text-gray-500 text-sm lg:text-md  font-medium">16+</span>
                    </div>
      
                </div>
            </div>
              <div class=" relative product w-full  md:w-1/2 lg:w-[25vw] flex-shrink-0 snap-start  ">
                <div
                    class="absolute top-5 left-2 bg-sky-500 text-white text-sm font-regular  px-2 text-[12px] lg:px-3 py-1 rounded-md">
                    25% offer
                </div>
                <div class="productImage mb-4  ">
                    <img src="{{ asset('frontend/assets/images/productDemImg.jpeg')}}" alt="" class="rounded-xl">
                </div>
                <div class="productSubIcons mb-3 flex justify-between items-center  ">
                    <div class="productLeft text-[#6E6E6E] ">620020</div>
                    <div class="productIconSet flex justify-between gap-2 items-center">
                        <img src="{{ asset('frontend/assets/images/ma;e.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/female.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/kid.svg')}}" alt="">
      
                    </div>
                </div>
                <div class="productTitle mb-1 text-md font-medium lg:text-xl">Shopping Bags</div>
                <div class="productTag mb-2 text-[#E2001A] text-[12px] ">Fruit of the loom</div>
                <div class="productColors mb-2 ">
                    <div class="flex items-center space-x-2">
                        <div class="relative flex -space-x-3">
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-purple-700 rounded-full border-2 border-white"></div>
                            <div class=" w-6 h-6 lg:w-8 lg:h-8 bg-blue-600 rounded-full border-2 border-white"></div>
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-sky-400 rounded-full border-2 border-white"></div>
                        </div>
                        <span class="text-gray-500 text-sm lg:text-md  font-medium">16+</span>
                    </div>
      
                </div>
            </div>
              <div class=" relative product w-full  md:w-1/2 lg:w-[25vw] flex-shrink-0 snap-start  ">
                <div
                    class="absolute top-5 left-2 bg-sky-500 text-white text-sm font-regular  px-2 text-[12px] lg:px-3 py-1 rounded-md">
                    25% offer
                </div>
                <div class="productImage mb-4  ">
                    <img src="{{ asset('frontend/assets/images/productDemImg.jpeg')}}" alt="" class="rounded-xl">
                </div>
                <div class="productSubIcons mb-3 flex justify-between items-center  ">
                    <div class="productLeft text-[#6E6E6E] ">620020</div>
                    <div class="productIconSet flex justify-between gap-2 items-center">
                        <img src="{{ asset('frontend/assets/images/ma;e.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/female.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/kid.svg')}}" alt="">
      
                    </div>
                </div>
                <div class="productTitle mb-1 text-md font-medium lg:text-xl">Shopping Bags</div>
                <div class="productTag mb-2 text-[#E2001A] text-[12px] ">Fruit of the loom</div>
                <div class="productColors mb-2 ">
                    <div class="flex items-center space-x-2">
                        <div class="relative flex -space-x-3">
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-purple-700 rounded-full border-2 border-white"></div>
                            <div class=" w-6 h-6 lg:w-8 lg:h-8 bg-blue-600 rounded-full border-2 border-white"></div>
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-sky-400 rounded-full border-2 border-white"></div>
                        </div>
                        <span class="text-gray-500 text-sm lg:text-md  font-medium">16+</span>
                    </div>
      
                </div>
            </div>
              
            </div>
          </div>
        </section>
        <!-- your recent views -->
           <!-- final  -->
        <section id="customerAlsoBought" class=" px-4  lg:px-[120px] py-4 lg:py-[80px]">
          <div class="headingAndButtons flex justify-between items-center">
            <h2 class=" headingCus text-2xl lg:text-[48px] font-semibold ">Your Recents</h2>
            <div class="buttons flex gap-4">
              <button id="prevBtn2" class=" bg-gray-100 h-[40px] w-[40px] lg:h-[45px] lg:w-[45px] text-white rounded-full flex justify-center items-center">
                <img src="{{ asset('frontend/assets/images/productBack.svg')}}" alt="" class="w-1/2 h-1/2 " >
              </button>
              <button id="nextBtn2" class=" bg-gray-100 h-[40px] w-[40px] lg:h-[45px] lg:w-[45px] text-white rounded-full flex justify-center items-center ">
                <img src="{{ asset('frontend/assets/images/forwardArrow.svg')}}" alt="" class="w-1/2 h-1/2 ">
              </button>
            </div>
          </div>
        
          <!-- Carousel Wrapper -->
          <div class="relative mt-10">
            <div
              id="carousel2"
              class="flex gap-10 overflow-x-scroll scroll-smooth snap-x snap-mandatory scrollbar-hide"
            >
              <!-- Product 1 -->
             
              <div class=" relative product w-full md:w-1/2 lg:w-[25vw] flex-shrink-0 snap-start  ">
                <div
                    class="absolute top-5 left-2 bg-sky-500 text-white text-sm font-regular  px-2 text-[12px] lg:px-3 py-1 rounded-md">
                    25% offer
                </div>
                <div class="productImage mb-4  ">
                    <img src="{{ asset('frontend/assets/images/productDemImg.jpeg')}}" alt="" class="rounded-xl">
                </div>
                <div class="productSubIcons mb-3 flex justify-between items-center  ">
                    <div class="productLeft text-[#6E6E6E] ">620020</div>
                    <div class="productIconSet flex justify-between gap-2 items-center">
                        <img src="{{ asset('frontend/assets/images/ma;e.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/female.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/kid.svg')}}" alt="">
      
                    </div>
                </div>
                <div class="productTitle mb-1 text-md font-medium lg:text-xl">Shopping Bags</div>
                <div class="productTag mb-2 text-[#E2001A] text-[12px] ">Fruit of the loom</div>
                <div class="productColors mb-2 ">
                    <div class="flex items-center space-x-2">
                        <div class="relative flex -space-x-3">
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-purple-700 rounded-full border-2 border-white"></div>
                            <div class=" w-6 h-6 lg:w-8 lg:h-8 bg-blue-600 rounded-full border-2 border-white"></div>
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-sky-400 rounded-full border-2 border-white"></div>
                        </div>
                        <span class="text-gray-500 text-sm lg:text-md  font-medium">16+</span>
                    </div>
      
                </div>
            </div>
              <div class=" relative product w-full md:w-1/2  lg:w-[25vw] flex-shrink-0 snap-start  ">
                <div
                    class="absolute top-5 left-2 bg-sky-500 text-white text-sm font-regular  px-2 text-[12px] lg:px-3 py-1 rounded-md">
                    25% offer
                </div>
                <div class="productImage mb-4  ">
                    <img src="{{ asset('frontend/assets/images/productDemImg.jpeg')}}" alt="" class="rounded-xl">
                </div>
                <div class="productSubIcons mb-3 flex justify-between items-center  ">
                    <div class="productLeft text-[#6E6E6E] ">620020</div>
                    <div class="productIconSet flex justify-between gap-2 items-center">
                        <img src="{{ asset('frontend/assets/images/ma;e.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/female.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/kid.svg')}}" alt="">
      
                    </div>
                </div>
                <div class="productTitle mb-1 text-md font-medium lg:text-xl">Shopping Bags</div>
                <div class="productTag mb-2 text-[#E2001A] text-[12px] ">Fruit of the loom</div>
                <div class="productColors mb-2 ">
                    <div class="flex items-center space-x-2">
                        <div class="relative flex -space-x-3">
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-purple-700 rounded-full border-2 border-white"></div>
                            <div class=" w-6 h-6 lg:w-8 lg:h-8 bg-blue-600 rounded-full border-2 border-white"></div>
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-sky-400 rounded-full border-2 border-white"></div>
                        </div>
                        <span class="text-gray-500 text-sm lg:text-md  font-medium">16+</span>
                    </div>
      
                </div>
            </div>
              <div class=" relative product w-full md:w-1/2  lg:w-[25vw] flex-shrink-0 snap-start  ">
                <div
                    class="absolute top-5 left-2 bg-sky-500 text-white text-sm font-regular  px-2 text-[12px] lg:px-3 py-1 rounded-md">
                    25% offer
                </div>
                <div class="productImage mb-4  ">
                    <img src="{{ asset('frontend/assets/images/productDemImg.jpeg')}}" alt="" class="rounded-xl">
                </div>
                <div class="productSubIcons mb-3 flex justify-between items-center  ">
                    <div class="productLeft text-[#6E6E6E] ">620020</div>
                    <div class="productIconSet flex justify-between gap-2 items-center">
                        <img src="{{ asset('frontend/assets/images/ma;e.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/female.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/kid.svg')}}" alt="">
      
                    </div>
                </div>
                <div class="productTitle mb-1 text-md font-medium lg:text-xl">Shopping Bags</div>
                <div class="productTag mb-2 text-[#E2001A] text-[12px] ">Fruit of the loom</div>
                <div class="productColors mb-2 ">
                    <div class="flex items-center space-x-2">
                        <div class="relative flex -space-x-3">
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-purple-700 rounded-full border-2 border-white"></div>
                            <div class=" w-6 h-6 lg:w-8 lg:h-8 bg-blue-600 rounded-full border-2 border-white"></div>
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-sky-400 rounded-full border-2 border-white"></div>
                        </div>
                        <span class="text-gray-500 text-sm lg:text-md  font-medium">16+</span>
                    </div>
      
                </div>
            </div>
              <div class=" relative product w-full md:w-1/2  lg:w-[25vw] flex-shrink-0 snap-start  ">
                <div
                    class="absolute top-5 left-2 bg-sky-500 text-white text-sm font-regular  px-2 text-[12px] lg:px-3 py-1 rounded-md">
                    25% offer
                </div>
                <div class="productImage mb-4  ">
                    <img src="{{ asset('frontend/assets/images/productDemImg.jpeg')}}" alt="" class="rounded-xl">
                </div>
                <div class="productSubIcons mb-3 flex justify-between items-center  ">
                    <div class="productLeft text-[#6E6E6E] ">620020</div>
                    <div class="productIconSet flex justify-between gap-2 items-center">
                        <img src="{{ asset('frontend/assets/images/ma;e.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/female.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/kid.svg')}}" alt="">
      
                    </div>
                </div>
                <div class="productTitle mb-1 text-md font-medium lg:text-xl">Shopping Bags</div>
                <div class="productTag mb-2 text-[#E2001A] text-[12px] ">Fruit of the loom</div>
                <div class="productColors mb-2 ">
                    <div class="flex items-center space-x-2">
                        <div class="relative flex -space-x-3">
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-purple-700 rounded-full border-2 border-white"></div>
                            <div class=" w-6 h-6 lg:w-8 lg:h-8 bg-blue-600 rounded-full border-2 border-white"></div>
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-sky-400 rounded-full border-2 border-white"></div>
                        </div>
                        <span class="text-gray-500 text-sm lg:text-md  font-medium">16+</span>
                    </div>
      
                </div>
            </div>
              <div class=" relative product w-full md:w-1/2  lg:w-[25vw] flex-shrink-0 snap-start  ">
                <div
                    class="absolute top-5 left-2 bg-sky-500 text-white text-sm font-regular  px-2 text-[12px] lg:px-3 py-1 rounded-md">
                    25% offer
                </div>
                <div class="productImage mb-4  ">
                    <img src="{{ asset('frontend/assets/images/productDemImg.jpeg')}}" alt="" class="rounded-xl">
                </div>
                <div class="productSubIcons mb-3 flex justify-between items-center  ">
                    <div class="productLeft text-[#6E6E6E] ">620020</div>
                    <div class="productIconSet flex justify-between gap-2 items-center">
                        <img src="{{ asset('frontend/assets/images/ma;e.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/female.svg')}}" alt="">
                        <img src="{{ asset('frontend/assets/images/kid.svg')}}" alt="">
      
                    </div>
                </div>
                <div class="productTitle mb-1 text-md font-medium lg:text-xl">Shopping Bags</div>
                <div class="productTag mb-2 text-[#E2001A] text-[12px] ">Fruit of the loom</div>
                <div class="productColors mb-2 ">
                    <div class="flex items-center space-x-2">
                        <div class="relative flex -space-x-3">
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-purple-700 rounded-full border-2 border-white"></div>
                            <div class=" w-6 h-6 lg:w-8 lg:h-8 bg-blue-600 rounded-full border-2 border-white"></div>
                            <div class="w-6 h-6 lg:w-8 lg:h-8 bg-sky-400 rounded-full border-2 border-white"></div>
                        </div>
                        <span class="text-gray-500 text-sm lg:text-md  font-medium">16+</span>
                    </div>
      
                </div>
            </div>
              
            </div>
          </div>
        </section>
    </main>



    @endsection