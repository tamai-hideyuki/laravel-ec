<div style="display:grid; gap:1rem;">
    <div>
        <label style="display:block; font-weight:600; margin-bottom:.3rem;">商品名 <span style="color:var(--danger);">*</span></label>
        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}"
               style="width:100%; padding:.5rem .8rem; border:1px solid var(--border); border-radius:6px; font-size:.95rem;">
    </div>

    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem;">
        <div>
            <label style="display:block; font-weight:600; margin-bottom:.3rem;">価格（円） <span style="color:var(--danger);">*</span></label>
            <input type="number" name="price" value="{{ old('price', $product->price ?? '') }}" min="0"
                   style="width:100%; padding:.5rem .8rem; border:1px solid var(--border); border-radius:6px; font-size:.95rem;">
        </div>
        <div>
            <label style="display:block; font-weight:600; margin-bottom:.3rem;">在庫数 <span style="color:var(--danger);">*</span></label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock ?? '') }}" min="0"
                   style="width:100%; padding:.5rem .8rem; border:1px solid var(--border); border-radius:6px; font-size:.95rem;">
        </div>
    </div>

    <div>
        <label style="display:block; font-weight:600; margin-bottom:.3rem;">カテゴリ</label>
        <input type="text" name="category" value="{{ old('category', $product->category ?? '') }}"
               placeholder="例：トップス、ボトムス、シューズ"
               style="width:100%; padding:.5rem .8rem; border:1px solid var(--border); border-radius:6px; font-size:.95rem;">
    </div>

    <div>
        <label style="display:block; font-weight:600; margin-bottom:.3rem;">説明</label>
        <textarea name="description" rows="3"
                  style="width:100%; padding:.5rem .8rem; border:1px solid var(--border); border-radius:6px; font-size:.95rem; resize:vertical;">{{ old('description', $product->description ?? '') }}</textarea>
    </div>
</div>
