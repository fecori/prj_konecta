<?php

namespace App\Controllers;

use App\Models\Categorias;
use App\Models\Producto;
use App\Models\ProductoVentas;

class Home extends BaseController
{

    protected $session;
    protected $data;
    protected $categorias;
    protected $productos;
    protected $productos_ventas;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->data['session'] = $this->session;
        $this->categorias = new Categorias();
        $this->productos = new Producto();
        $this->productos_ventas = new ProductoVentas();
    }

    public function index()
    {
        $this->data['page_title'] = "Inicio";
        echo view('templates/header', $this->data);
        echo view('crud/home', $this->data);
        echo view('templates/footer');
    }

    public function agregar()
    {
        $this->data['page_title'] = "Agregar Nuevo producto";
        $this->data['request'] = $this->request;
        $this->data['categorias'] = $this->categorias->select('*')->get()->getResult();
        echo view('templates/header', $this->data);
        echo view('crud/agregar', $this->data);
        echo view('templates/footer');
    }

    public function venta($id = '')
    {
        $this->data['page_title'] = "Venta productos";
        $this->data['request'] = $this->request;
        $this->data['producto'] = $this->productos->select('*')->where(['id' => $id])->first();
        $this->data['stock'] = $this->data['producto']['stock'];
        echo view('templates/header', $this->data);
        echo view('crud/venta', $this->data);
        echo view('templates/footer');
    }

    public function borrar($id = '')
    {
        $eliminar_producto = $this->productos->delete($id);
        if ($eliminar_producto) {
            $this->session->setFlashdata('success_message', 'Producto eliminado correctamente.');
            return redirect()->to('home/listado');
        }
    }

    public function guardar_venta()
    {
        $this->data['request'] = $this->request;
        $producto = $this->productos
            ->select('producto.*, SUM(producto_ventas.vendidos) as vendidos')
            ->join('producto_ventas', 'producto_ventas.id_producto = ' . $this->request->getPost('id_producto'), 'left')
            ->where(['producto.id' => $this->request->getPost('id_producto')])
            ->first();

        $post_venta_producto = [
            'id_producto' => $this->request->getPost('id_producto'),
            'vendidos' => $this->request->getPost('cantidad')
        ];

        $guardar_venta = $this->productos_ventas->insert($post_venta_producto);

        if ($guardar_venta) {
            // var_dump('venta registrada');

            $actualizar_stock_producto = [
                'nombre' => $producto['nombre'],
                'referencia' => $producto['referencia'],
                'precio' => $producto['precio'],
                'peso' => $producto['peso'],
                'id_categoria' => $producto['id_categoria'],
                'stock' => $producto['stock'] - $this->request->getPost('cantidad')
            ];

            $guardar_producto = $this->productos->where('id', $producto['id'])->set($actualizar_stock_producto)->update();

            if ($guardar_producto) {
                $this->session->setFlashdata('success_message', 'Venta de producto realizado con exito.');
                return redirect()->to('home/listado');
            }
        }
    }

    public function editar($id = '')
    {
        $this->data['page_title'] = "Editar producto";
        $this->data['categorias'] = $this->categorias->select('*')->get()->getResult();
        $this->data['producto'] = $this->productos
            ->select('producto.*, SUM(producto_ventas.vendidos) as vendidos')
            ->join('producto_ventas', 'producto_ventas.id_producto = ' . $id, 'left')
            ->where(['producto.id' => $id])
            ->first();
        echo view('templates/header', $this->data);
        echo view('crud/editar', $this->data);
        echo view('templates/footer');
    }

    public function guardar()
    {
        $this->data['request'] = $this->request;
        $post = [
            'nombre' => $this->request->getPost('nombre'),
            'referencia' => $this->request->getPost('referencia'),
            'precio' => $this->request->getPost('precio'),
            'peso' => $this->request->getPost('peso'),
            'id_categoria' => $this->request->getPost('categoria'),
            'stock' => $this->request->getPost('stock')
        ];

        if (!empty($this->request->getPost('id_producto'))) {
            $guardar = $this->productos->where(['id' => $this->request->getPost('id_producto')])->set($post)->update();
        } else {
            $guardar = $this->productos->insert($post);
        }

        if ($guardar) {

            if (!empty($this->request->getPost('id_producto'))) {
                $this->session->setFlashdata('success_message', 'Producto actualizado con exito.');
            } else {
                $this->session->setFlashdata('success_message', 'Producto registrado con exito.');
            }

            return redirect()->to('home/listado');
        } else {
            echo view('templates/header', $this->data);
            echo view('crud/agregar', $this->data);
            echo view('templates/footer');
        }

    }

    public function listado()
    {
        $this->data['page_title'] = "Listado producto";
        $this->session->setFlashdata('');
        $this->data['productos'] = $this->productos
            ->select('producto.*, categorias.nombre as nombre_categoria, SUM(producto_ventas.vendidos) as vendidos')
            ->join('categorias', 'categorias.id = producto.id_categoria')
            ->join('producto_ventas', 'producto_ventas.id_producto = producto.id', 'left')
            ->groupBy('producto.id')
            ->get()->getResult();
        echo view('templates/header', $this->data);
        echo view('crud/listado', $this->data);
        echo view('templates/footer');
    }
}
