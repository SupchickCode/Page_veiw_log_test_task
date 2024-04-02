# Docker тут условно (мне просто удобнее локально было сделать через него)

# Пример запрос из задания со звездочкой 
```
SELECT
    DATE(created_at) AS day,
    DATE_FORMAT(created_at, '%Y-%m') AS month,
    COUNT(*) AS total_views,
    COUNT(user_id) AS auth_views,
    COUNT(*) - COUNT(user_id) AS ano_views
FROM
    page_view_logs
GROUP BY
    DATE(created_at), DATE_FORMAT(created_at, '%Y-%m')
ORDER BY
    month, day;
```

# Предложить варианты оптимизации запросов или рефакторинг*
- Использование индексов
- Кэширование
- Парцирование
- Предпочитайте JOIN к подзапросам
- Кастомные настройки БД (память и ресуры пк)
