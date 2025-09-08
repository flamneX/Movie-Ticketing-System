(function () {
        const form = document.getElementById('contactForm');
        const nameEl = document.getElementById('name');
        const emailEl = document.getElementById('email');
        const messageEl = document.getElementById('message');

        const nameErr = document.getElementById('nameError');
        const emailErr = document.getElementById('emailError');
        const messageErr = document.getElementById('messageError');

        const emailPattern =
          /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/i; // simple + robust enough for UI

        function setError(el, errEl, msg) {
          errEl.textContent = msg || '';
          if (msg) {
            el.classList.add('is-invalid');
          } else {
            el.classList.remove('is-invalid');
          }
        }

        function validateName() {
          const v = nameEl.value.trim();
          if (!v) return setError(nameEl, nameErr, 'Name is required'), false;
          if (v.length < 2) return setError(nameEl, nameErr, 'Name must be at least 2 characters'), false;
          return setError(nameEl, nameErr, ''), true;
        }

        function validateEmail() {
          const v = emailEl.value.trim();
          if (!v) return setError(emailEl, emailErr, 'A valid email is required'), false;
          if (!emailPattern.test(v)) return setError(emailEl, emailErr, 'Please enter a valid email address'), false;
          return setError(emailEl, emailErr, ''), true;
        }

        function validateMessage() {
          const v = messageEl.value.trim();
          if (!v) return setError(messageEl, messageErr, 'Subject/Message is required'), false;
          if (v.length < 10) return setError(messageEl, messageErr, 'Please provide at least 10 characters'), false;
          return setError(messageEl, messageErr, ''), true;
        }

        // Live validation
        nameEl.addEventListener('input', validateName);
        emailEl.addEventListener('input', validateEmail);
        messageEl.addEventListener('input', validateMessage);

        form.addEventListener('submit', function (e) {
          const ok =
            validateName() &
            validateEmail() &
            validateMessage(); // bitwise to run all; result coerces to 0/1
          if (!ok) e.preventDefault();
        });
      })();