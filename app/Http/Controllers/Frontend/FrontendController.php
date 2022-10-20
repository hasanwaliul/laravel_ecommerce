<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\FrontendDataService;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index(){
        $categories = (new FrontendDataService())->CategoryInfoCollect();
        $banners = (new FrontendDataService())->BannerInfoCollect();
        $products = (new FrontendDataService())->ActiveProductInfoCollect();
        $featureds = (new FrontendDataService())->FeaturedProductInfoCollect();
        $hot_deals = (new FrontendDataService())->HotDealsRelatedProductInfoCollect();
        $special_offers = (new FrontendDataService())->SpecialOfferRelatedProductInfoCollect();
        $special_deals = (new FrontendDataService())->SpecialDealRelatedProductInfoCollect();
        //  Collect Specific Category Wise Products with skip query
        $skip_catg_id0 = (new FrontendDataService())->FindCategoryWithSkip0(); // For 1st Category
        $skip_products0 = (new FrontendDataService())->FindProductsForSkipCatgId0($skip_catg_id0); // 1st Catagory Wise Products
        $skip_catg_id1 = (new FrontendDataService())->FindCategoryWithSkip1(); // For 2nd Category
        $skip_products1 = (new FrontendDataService())->FindProductsForSkipCatgId1($skip_catg_id1); // 2nd Catagory Wise Products

        // Collect Specific Brand Wise Products with skip query
        $skip_brand_id0 = (new FrontendDataService())->FindBrandWithSkip0();
        $skip_brand_products0 = (new FrontendDataService())->FindProductsForSkipBrandId0($skip_brand_id0);

        // Collect Product Tags From Database
        $tags_en = (new FrontendDataService())->CollectProductsTagsEnglish();
        $tags_bn = (new FrontendDataService())->CollectProductsTagsBangla();



        // dd( $tags_bn);
        return view('frontend.index',
        compact('categories', 'banners', 'products', 'featureds', 'hot_deals', 'special_offers',
        'special_deals', 'skip_catg_id0', 'skip_products0', 'skip_catg_id1', 'skip_products1',
        'skip_brand_id0', 'skip_brand_products0', 'tags_en', 'tags_bn'));
    }

    public function SingleProductDetails($id, $slug){
        $categories = (new FrontendDataService())->CategoryInfoCollect();
        $singleProduct = (new FrontendDataService())->SingleProductDetails($id);
        $multiImages = (new FrontendDataService())->SingleProductWiseMultiImgCollect($id);
        // dd($multiImages);
        return view('frontend.product-details', compact('singleProduct', 'multiImages'));
    }

        // ########## Products Tag Wise Product show  ##########
        public function productTagWiseProductShow($tag){
            // dd('Calling');
            $products = (new FrontendDataService())->FindTagWiseProductsInfo($tag);
            dd($products);
            return view('frontend.tagwise-product');
        }
}
