<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null) {

    
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $role = (object) [
            "admin" => (object) [
                "Kajur" => "Kajur", 
                "Sekjur" => "Sekjur",
                "Kappc" => "Kappc",
            ],
            "operator" => (object) [
                "Operator" => "Operator",
                "Kalab" => "Kalab",
            ],
            "user" => (object) [
                "Gudang" => "Gudang",
                "Produksi" => "Produksi",
            ],
            "superuser" => (object) [
                "Superuser" => "Superuser",
            ],
        ];

        $allowedController = (object) [
            "admin" => (object) [
                "Dashboard" => "Dashboard",
                "KelolaAkun" => "KelolaAkun",
                "Order" => "Order",
                "Profile" => "Profile",
                "Proses" => "Proses",
                "Spk" => "Spk",
                "Visualization" => "Visualization",
            ],
            "operator" => (object) [
                "Dashboard" => "Dashboard",
                "Permesinan" => "Permesinan",
            ],
            "user" => (object) [
                "Dashboard" => "Dashboard",
                "Gudang" => "Gudang",
                "Permesinan" => "Permesinan",
            ],
        ];
        $currentRole = session()->get('Role');
        $currentController = uri_string();
        
        if(property_exists($role->operator , $currentRole) == true) {
            if(property_exists($allowedController->operator, $currentController) == false) {
                return redirect()->to(base_url("Dashboard"));
            }
        }

        if(property_exists($role->user , $currentRole) == true) {
            if(property_exists($allowedController->user, $currentController) == false) {
                return redirect()->to(base_url("Dashboard"));
            }
        }

        if(property_exists($role->admin , $currentRole) == true) {
            if(property_exists($allowedController->admin, $currentController) == false) {
                return redirect()->to(base_url("Dashboard"));
            }
        }
        
    }
}