<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Product::query();
        
        // Filter by category if selected
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        
        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        $products = $query->paginate(12);
        
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the 'create' view to show the product creation form
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_name' => 'required|string|min:3|max:255|unique:products',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if an image file was uploaded
        if ($request->hasFile('image')) {
            // Generate a unique name for the image
            $imageName = time() . '.' . $request->image->extension();
            // Move the image to the 'images' directory
            $request->image->move(public_path('images'), $imageName);
            // Add the image name to the validated data
            $validatedData['image'] = $imageName;
        }

        // Ensure description is not null
        if (!isset($validatedData['description'])) {
            $validatedData['description'] = '';
        }

        // Create a new product record in the database
        Product::create($validatedData);

        // Redirect to the products index page with a success message
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\View\View
     */
    public function edit(Product $product)
    {
        // Return the 'edit' view with the product data
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_name' => 'required|string|min:3|max:255|unique:products,product_name,' . $product->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if an image file was uploaded
        if ($request->hasFile('image')) {
            // Generate a unique name for the new image
            $imageName = time() . '.' . $request->image->extension();
            // Move the new image to the 'images' directory
            $request->image->move(public_path('images'), $imageName);
            // Add the new image name to the validated data
            $validatedData['image'] = $imageName;

            // Delete the old image if it exists
            if ($product->image && file_exists(public_path('images/' . $product->image))) {
                unlink(public_path('images/' . $product->image));
            }
        }

        // Ensure description is not null
        if (!isset($validatedData['description'])) {
            $validatedData['description'] = '';
        }

        // Update the existing product record with the validated data
        $product->update($validatedData);

        // Redirect to the products index page with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        // Delete the image if it exists
        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }

        // Delete the product record from the database
        $product->delete();

        // Redirect to the products index page with a success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function adminIndex(Request $request)
    {
        $query = Product::query();
        
        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('product_name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        // Filter by category if needed
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        
        $products = $query->get(); // or use paginate(12) if you want pagination
        
        return view('admin.products.index', compact('products'));
    }

    public function adminCreate()
    {
        return view('admin.products.create');
    }

    public function adminStore(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_name' => 'required|string|min:3|max:255|unique:products',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }

        // Ensure description is not null
        if (!isset($validatedData['description'])) {
            $validatedData['description'] = '';
        }

        // Create a new product record in the database
        Product::create($validatedData);

        // Redirect to the admin products index page with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function adminEdit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function adminUpdate(Request $request, Product $product)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_name' => 'required|string|min:3|max:255|unique:products,product_name,' . $product->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if an image file was uploaded
        if ($request->hasFile('image')) {
            // Generate a unique name for the new image
            $imageName = time() . '.' . $request->image->extension();
            // Move the new image to the 'images' directory
            $request->image->move(public_path('images'), $imageName);
            // Add the new image name to the validated data
            $validatedData['image'] = $imageName;

            // Delete the old image if it exists
            if ($product->image && file_exists(public_path('images/' . $product->image))) {
                unlink(public_path('images/' . $product->image));
            }
        }

        // Ensure description is not null
        if (!isset($validatedData['description'])) {
            $validatedData['description'] = '';
        }

        // Update the existing product record with the validated data
        $product->update($validatedData);

        // Redirect to the admin products index page with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function adminDestroy(Product $product)
    {
        // Delete the image if it exists
        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }

        // Delete the product record from the database
        $product->delete();

        // Redirect to the admin products index page with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
