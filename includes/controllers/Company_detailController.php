<?php
class Company_detailController extends CompanyController
{
    public function detail_data()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $company = $this->_company->getCompanyById($id);
            if (!empty($company)) {
                return $company;
            } else {
                RedirectController::error();
                return null;
            }
        } else {
            return null;
        }
    }
}