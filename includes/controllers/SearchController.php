<?php

class SearchController
{
    public function searching(){
        if(isset($_POST['search_text']) && $_POST['search_text'] != "") {
            $discount = new Discount();
            $company = new Company();
            $search = htmlentities($_POST['search_text']);
            $discount_result = $discount->searchForDiscount($search);
            $company_result = $company->searchForCompany($search);

            return array("discount"=> $discount_result, "company"=> $company_result);
        }

    }

}