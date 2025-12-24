<div class="buttons-container">
    <button class="gradient-btn">
        <span class="icon">🔥</span>
        <span class="text">ОГНЕЗАЩИТА</span>
        <span class="arrow">➔</span>
    </button>

    <button class="gradient-btn">
        <span class="icon">🛡️</span>
        <span class="text">АНТИКОРРОЗИЯ</span>
        <span class="arrow">➔</span>
    </button>
</div>

<style>
    .buttons-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 300px; /* можно менять под дизайн */
        margin: 20px;
    }

    .gradient-btn {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 20px;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        color: white;
        background: linear-gradient(90deg, #ff6b00, #ff3d00);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .gradient-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.25);
    }

    .icon {
        margin-right: 10px;
        font-size: 18px;
    }

    .arrow {
        font-size: 18px;
    }
</style>
