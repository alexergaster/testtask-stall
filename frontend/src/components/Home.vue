<template>
  <div class="container mt-5">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title mb-3">Про мене</h1>
        <div>
          <h3 class="card-text">Час, витрачений на тестове завдання становить ~5-6 годин.</h3>
          <h3 class="card-text">Інформація про мене</h3>
          <p>
            Я, Бондаренко Олександр Федорович, живу в місті Суми, готовий до переїзду в інше місто. Навчався в Сумському
            державному університеті за спеціальністю 122 "Комп'ютерні науки", до цього — в Машинобудівному фаховому
            коледжі СумДУ, на тій же спеціальності.
          </p>
          <p>
            Під час навчання працював в дитячій школі <a href="https://e-school.in.ua/">E-School</a>, де був автором
            одного з курсів — Веб-розробка з акцентом на JavaScript, який викладав протягом одного року. Паралельно
            допомагав у роботі з базами даних на підприємстві ТОВ "Групсервіс".
          </p>

          <p>
            Маю певний комерційний досвід у розробці вебсайтів та інформаційних систем.
          </p>

          <ul>
            <li>
              <a href="https://e-school.in.ua/">E-School</a> - велика інформаційна система обліку користувачів,
              розроблена на замовлення
              керівництва школи. У даній системі присутній функціонал особистого кабінету для вчителів та батьків, де
              для вчителів є
              можливість відзначати учнів (як на уроках, так і на відпрацюваннях), а для батьків — оплачувати курси для
              дітей (реалізовано
              через баланс користувача та платіжний сервіс Liqpay). Для користувачів доступна можливість реєстрації на
              майстер-клас та
              залишення питань, інформація з цих форм, крім запису в базі даних, також надсилається на пошту. В
              адміністративній панелі
              є можливість редагування/створення/видалення курсів, батьків, учнів, вчителів тощо.
            </li>
            <li>
              <a href="https://www.parsigar.com.ua/">Parsigar</a> - інтернет-магазин, розроблений на WordPress. Для
              цього проєкту
              було кастомізовано тему шляхом написання плагіну, який вносить певні зміни, наприклад, зміну форми
              оформлення
              замовлення. Також було виправлено баг з темою. Для цього проєкту налаштовано SEO та WooCommerce.
            </li>
          </ul>

          <p>
            На даний момент це всі комерційні проєкти, якщо не брати до уваги велику кількість (більше 15) вебсайтів,
            розроблених для захисту дипломів.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Home',
};
</script>
