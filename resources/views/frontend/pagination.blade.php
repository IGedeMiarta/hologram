<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body,
    button {
        font-family: "Inter", sans-serif;
        color: #343a40;
        line-height: 1;
    }

    .pagination,
    .page-numbers {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .pagination {
        margin-top: 128px;
    }

    .btn-nav,
    .btn-page {
        border-radius: 50%;
        background-color: #fff;
        cursor: pointer;
    }

    .btn-nav {
        padding: 8px;
    }

    .btn-nav {
        width: 42px;
        height: 42px;
        border: 1.5px solid #111;
        color: #111;
    }

    .btn-nav:hover,
    .btn-page:hover {
        background-color: #111;
        color: #fff;
    }

    .btn-page {
        border: none;
        width: 36px;
        height: 36px;
        font-size: 16px;
    }

    .btn-selected {
        background-color: #111;
        color: #fff;
    }
</style>

@if ($paginator->hasPages())
    <div class="pagination">
        <button class="btn-nav left-btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="left-icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </button>
        <div class="page-numbers">
            <button class="btn-page">1</button>
            <button class="btn-page">2</button>
            <button class="btn-page btn-selected">3</button>
            <button class="btn-page">4</button>
            <button class="btn-page">5</button>
            <button class="btn-page">6</button>
            <span class="dots">...</span>
            <button class="btn-page">23</button>
        </div>
        <button class="btn-nav right-btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="right-icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </button>
    </div>
@endif
